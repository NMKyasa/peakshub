<?php

namespace App\Services;

use App\Constants\CacheKeys;
use App\Constants\SettingTypes;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

/**
 * |--------------------------------------------------------------------------
 * | Setting Service
 * |--------------------------------------------------------------------------
 * |
 * | Provides a centralized API for reading application settings.
 * | This service is the Single Source of Truth (SSOT) for all
 * | configurable application values.
 * |
 * |--------------------------------------------------------------------------
 */
final class SettingService
{
    /**
     * Cached settings for the current request.
     *
     * @var array<string, array>|null
     */
    private static ?array $settings = null;

    /**
     * Prevent class instantiation.
     */
    private function __construct()
    {
    }

    /*
    |--------------------------------------------------------------------------
    | Loading Settings
    |--------------------------------------------------------------------------
    */

    /**
     * Load all autoload settings.
     *
     * Settings are loaded once per request and cached indefinitely
     * using Laravel's cache.
     *
     * @return array<string, array>
     */
    private static function load(): array
    {
        if (self::$settings !== null) {
            return self::$settings;
        }

        self::$settings = Cache::rememberForever(
            CacheKeys::SETTINGS,
            function () {

                return Setting::query()
                    ->where('autoload', true)
                    ->get()
                    ->keyBy(function (Setting $setting) {

                        return "{$setting->group}.{$setting->key}";

                    })
                    ->map(function (Setting $setting) {

                        return [
                            'value' => $setting->value,
                            'type' => $setting->type,
                            'description' => $setting->description,
                            'is_public' => $setting->is_public,
                            'autoload' => $setting->autoload,
                        ];

                    })
                    ->toArray();
            }
        );

        return self::$settings;
    }

    /*
    |--------------------------------------------------------------------------
    | Reading Settings
    |--------------------------------------------------------------------------
    */

    /**
     * Retrieve a setting value.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = self::load();

        if (! array_key_exists($key, $settings)) {
            return $default;
        }

        return self::cast(
            $settings[$key]['value'],
            $settings[$key]['type']
        );
    }

    /**
     * Determine whether a setting exists.
     */
    public static function has(string $key): bool
    {
        return array_key_exists(
            $key,
            self::load()
        );
    }

    /**
     * Retrieve all loaded settings.
     *
     * @return array<string, array>
     */
    public static function all(): array
    {
        return self::load();
    }

    /**
     * Retrieve all settings belonging to a group.
     *
     * @param string $group
     *
     * @return array<string, array>
     */
    public static function group(string $group): array
    {
        return collect(self::load())
            ->filter(function ($setting, $key) use ($group) {

                return str_starts_with(
                    $key,
                    "{$group}."
                );

            })
            ->toArray();
    }

    /**
     * Update the value of an existing setting.
     *
     * @param string $key
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public static function set(string $key, mixed $value): void
    {
        [$group, $settingKey] = self::parseKey($key);

        $setting = Setting::query()
            ->where('group', $group)
            ->where('key', $settingKey)
            ->first();

        if (! $setting) {
            throw new \InvalidArgumentException(
                "Setting [{$key}] does not exist."
            );
        }

        $setting->update([
            'value' => self::serialize($value, $setting->type),
        ]);

        self::reload();
    }

    /*
    |--------------------------------------------------------------------------
    | Cache Management
    |--------------------------------------------------------------------------
    */

    /**
     * Reload settings from the database.
     */
    public static function reload(): void
    {
        Cache::forget(CacheKeys::SETTINGS);

        self::$settings = null;

        self::load();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Parse a setting key into its group and key components.
     *
     * Example:
     * branding.logo
     *
     * becomes:
     * ['branding', 'logo']
     *
     * @param string $key
     *
     * @return array{0:string,1:string}
     *
     * @throws \InvalidArgumentException
     */
    private static function parseKey(string $key): array
    {
        $parts = explode('.', $key, 2);

        if (count($parts) !== 2) {
            throw new \InvalidArgumentException(
                "Invalid setting key [{$key}]. Expected format: group.key"
            );
        }

        return $parts;
    }

    /**
     * Convert a value into a database-storable string.
     *
     * @param mixed $value
     * @param string $type
     *
     * @return string|null
     */
    private static function serialize(mixed $value, string $type): ?string
    {
        if ($value === null) {
            return null;
        }

        return match ($type) {

            SettingTypes::BOOLEAN => $value ? '1' : '0',

            SettingTypes::INTEGER => (string) $value,

            SettingTypes::JSON => json_encode($value),

            default => (string) $value,

        };
    }

    /**
     * Cast a setting value to its configured type.
     *
     * @param mixed $value
     * @param string $type
     *
     * @return mixed
     */
    private static function cast(mixed $value, string $type): mixed
    {
        return match ($type) {

            SettingTypes::BOOLEAN => filter_var(
                $value,
                FILTER_VALIDATE_BOOLEAN
            ),

            SettingTypes::INTEGER => (int) $value,

            SettingTypes::JSON => json_decode(
                $value,
                true
            ),

            default => $value,
        };
    }
}

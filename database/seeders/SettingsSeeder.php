<?php

namespace Database\Seeders;

use App\Constants\SettingGroups;
use App\Constants\SettingKeys;
use App\Constants\SettingTypes;
use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * |--------------------------------------------------------------------------
 * | Settings Seeder
 * |--------------------------------------------------------------------------
 * |
 * | Seeds the application's default settings.
 * | These settings form the initial configuration and serve as the
 * | Single Source of Truth for configurable application values.
 * |
 * |--------------------------------------------------------------------------
 */
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [

            /*
            |--------------------------------------------------------------------------
            | Branding
            |--------------------------------------------------------------------------
            */

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'app_name',
                'value' => 'PeaksHub',
                'type' => SettingTypes::STRING,
                'description' => 'Application name',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 10,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'company_name',
                'value' => 'MRT IT Peaks Limited',
                'type' => SettingTypes::STRING,
                'description' => 'Company name',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 20,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'tagline',
                'value' => 'Enterprise Resource Management System',
                'type' => SettingTypes::STRING,
                'description' => 'Application tagline',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 30,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'logo',
                'value' => '',
                'type' => SettingTypes::IMAGE,
                'description' => 'Application logo',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 40,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'favicon',
                'value' => '',
                'type' => SettingTypes::IMAGE,
                'description' => 'Application favicon',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 50,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'primary_color',
                'value' => '#38B6FF',
                'type' => SettingTypes::COLOR,
                'description' => 'Primary brand color',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 60,
            ],

            [
                'group' => SettingGroups::BRANDING,
                'key' => 'secondary_color',
                'value' => '#7ED957',
                'type' => SettingTypes::COLOR,
                'description' => 'Secondary brand color',
                'is_public' => true,
                'autoload' => true,
                'sort_order' => 70,
            ],

            /*
            |--------------------------------------------------------------------------
            | System
            |--------------------------------------------------------------------------
            */

            [
                'group' => SettingGroups::SYSTEM,
                'key' => 'timezone',
                'value' => 'Africa/Kampala',
                'type' => SettingTypes::STRING,
                'description' => 'Application timezone',
                'is_public' => false,
                'autoload' => true,
                'sort_order' => 10,
            ],

            [
                'group' => SettingGroups::SYSTEM,
                'key' => 'pagination',
                'value' => '15',
                'type' => SettingTypes::INTEGER,
                'description' => 'Default pagination size',
                'is_public' => false,
                'autoload' => true,
                'sort_order' => 20,
            ],

        ];

        foreach ($settings as $setting) {

            Setting::updateOrCreate(
                [
                    'group' => $setting['group'],
                    'key' => $setting['key'],
                ],
                $setting
            );

        }
    }
}

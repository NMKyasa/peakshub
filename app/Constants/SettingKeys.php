<?php

namespace App\Constants;

/**
 * |--------------------------------------------------------------------------
 * | Setting Keys
 * |--------------------------------------------------------------------------
 * |
 * | Defines the application setting keys used throughout PeaksHub.
 * | These constants provide a single source of truth for referencing
 * | configurable settings.
 * |
 * |--------------------------------------------------------------------------
 */
final class SettingKeys
{
    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    */

    public const APP_NAME = 'branding.app_name';

    public const COMPANY_NAME = 'branding.company_name';

    public const TAGLINE = 'branding.tagline';

    public const LOGO = 'branding.logo';

    public const SIDEBAR_LOGO = 'branding.sidebar_logo';

    public const FAVICON = 'branding.favicon';

    public const LOGIN_BACKGROUND = 'branding.login_background';

    public const PRIMARY_COLOR = 'branding.primary_color';

    public const SECONDARY_COLOR = 'branding.secondary_color';

    /*
    |--------------------------------------------------------------------------
    | System
    |--------------------------------------------------------------------------
    */

    public const TIMEZONE = 'system.timezone';

    public const DATE_FORMAT = 'system.date_format';

    public const TIME_FORMAT = 'system.time_format';

    public const PAGINATION = 'system.pagination';

    public const DEFAULT_LANGUAGE = 'system.default_language';
}

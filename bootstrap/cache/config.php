<?php return array (
  'access' => 
  array (
    'captcha' => 
    array (
      'contact' => false,
      'registration' => false,
      'login' => false,
    ),
    'registration' => true,
    'users' => 
    array (
      'confirm_email' => true,
      'change_email' => false,
      'admin_role' => 'administrator',
      'default_role' => 'user',
      'requires_approval' => false,
      'username' => 'email',
      'single_login' => false,
      'password_expires_days' => false,
      'password_history' => '3',
    ),
    'roles' => 
    array (
      'role_must_contain_permission' => true,
    ),
    'socialite_session_name' => 'socialite_provider',
  ),
  'accountant' => 
  array (
    'ledger' => 
    array (
      'implementation' => 'Altek\\Accountant\\Models\\Ledger',
      'threshold' => 0,
      'driver' => 'database',
    ),
    'resolvers' => 
    array (
      'context' => 'Altek\\Accountant\\Resolvers\\ContextResolver',
      'ip_address' => 'Altek\\Accountant\\Resolvers\\IpAddressResolver',
      'url' => 'Altek\\Accountant\\Resolvers\\UrlResolver',
      'user_agent' => 'Altek\\Accountant\\Resolvers\\UserAgentResolver',
      'user' => 'Altek\\Accountant\\Resolvers\\UserResolver',
    ),
    'contexts' => 4,
    'notary' => 'Altek\\Accountant\\Notary',
    'events' => 
    array (
      0 => 'created',
      1 => 'updated',
      2 => 'restored',
      3 => 'deleted',
      4 => 'forceDeleted',
      5 => 'toggled',
      6 => 'synced',
      7 => 'existingPivotUpdated',
      8 => 'attached',
      9 => 'detached',
    ),
    'user' => 
    array (
      'prefix' => 'user',
      'guards' => 
      array (
        0 => 'web',
        1 => 'api',
      ),
    ),
  ),
  'analytics' => 
  array (
    'google-analytics' => 'UA-XXXXX-X',
  ),
  'app' => 
  array (
    'read_only' => false,
    'name' => 'ShipEarn',
    'env' => 'local',
    'debug' => true,
    'testing' => false,
    'url' => 'http://packr.test',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'locale_php' => 'en_US',
    'key' => 'base64:wPB5bgfMvhY6M6VaD842Hs6EHNZAKhXqvgyn7CNCTTQ=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\ComposerServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\HelperServiceProvider',
      27 => 'App\\Providers\\ObserverServiceProvider',
      28 => 'App\\Providers\\RouteServiceProvider',
      29 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'passport',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Auth\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'breadcrumbs' => 
  array (
    'view' => 'backend.includes.partials.breadcrumbs',
    'files' => 'E:\\laragon\\www\\packr\\routes/breadcrumbs.php',
    'unnamed-route-exception' => true,
    'missing-route-bound-breadcrumb-exception' => true,
    'invalid-named-breadcrumb-exception' => true,
    'manager-class' => 'DaveJamesMiller\\Breadcrumbs\\BreadcrumbsManager',
    'generator-class' => 'DaveJamesMiller\\Breadcrumbs\\BreadcrumbsGenerator',
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'E:\\laragon\\www\\packr\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'shipearn_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'packr',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'packr',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'packr',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'packr',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'shipearn_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => false,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'driver' => 'file',
      'path' => 'E:\\laragon\\www\\packr\\storage\\debugbar',
      'connection' => NULL,
      'provider' => '',
    ),
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'auth' => true,
      'gate' => true,
      'session' => true,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'backtrace' => true,
        'timeline' => false,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => true,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'data' => false,
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\laragon\\www\\packr\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\laragon\\www\\packr\\storage\\app/public',
        'url' => 'http://packr.test/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
    ),
  ),
  'geoip' => 
  array (
    'log_failures' => true,
    'include_currency' => true,
    'service' => 'ipapi',
    'services' => 
    array (
      'maxmind_database' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindDatabase',
        'database_path' => 'E:\\laragon\\www\\packr\\storage\\app/geoip.mmdb',
        'update_url' => 'https://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz',
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'maxmind_api' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindWebService',
        'user_id' => NULL,
        'license_key' => NULL,
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'ipapi' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPApi',
        'secure' => true,
        'key' => NULL,
        'continent_path' => 'E:\\laragon\\www\\packr\\storage\\app/continents.json',
        'lang' => 'en',
      ),
    ),
    'cache' => 'none',
    'cache_tags' => NULL,
    'cache_expires' => 30,
    'default_location' => 
    array (
      'ip' => '127.0.0.0',
      'iso_code' => 'US',
      'country' => 'United States',
      'city' => 'New Haven',
      'state' => 'CT',
      'state_name' => 'Connecticut',
      'postal_code' => '06510',
      'lat' => 41.31,
      'lon' => -72.92,
      'timezone' => 'America/New_York',
      'continent' => 'NA',
      'default' => true,
      'currency' => 'USD',
    ),
  ),
  'gravatar' => 
  array (
    'default' => 
    array (
      'size' => 80,
      'fallback' => 'mm',
      'secure' => false,
      'maximumRating' => 'g',
      'forceDefault' => false,
      'forceExtension' => 'jpg',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'laravel-impersonate' => 
  array (
    'session_key' => 'impersonated_by',
    'session_guard' => 'impersonator_guard',
    'session_guard_using' => 'impersonator_guard_using',
    'default_impersonator_guard' => 'web',
    'take_redirect_to' => '/',
    'leave_redirect_to' => '/',
  ),
  'locale' => 
  array (
    'status' => true,
    'languages' => 
    array (
      'ar' => 
      array (
        0 => 'ar',
        1 => 'ar_AR',
        2 => true,
      ),
      'en' => 
      array (
        0 => 'en',
        1 => 'en_US',
        2 => false,
      ),
    ),
  ),
  'log-viewer' => 
  array (
    'storage-path' => 'E:\\laragon\\www\\packr\\storage\\logs',
    'pattern' => 
    array (
      'prefix' => 'laravel-',
      'date' => '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]',
      'extension' => '.log',
    ),
    'locale' => 'auto',
    'theme' => 'bootstrap-4',
    'route' => 
    array (
      'enabled' => true,
      'attributes' => 
      array (
        'prefix' => 'admin/log-viewer',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
      ),
    ),
    'per-page' => 30,
    'download' => 
    array (
      'prefix' => 'laravel-',
      'extension' => 'log',
    ),
    'menu' => 
    array (
      'filter-route' => 'log-viewer::logs.filter',
      'icons-enabled' => true,
    ),
    'icons' => 
    array (
      'all' => 'fa fa-fw fa-list',
      'emergency' => 'fa fa-fw fa-bug',
      'alert' => 'fa fa-fw fa-bullhorn',
      'critical' => 'fa fa-fw fa-heartbeat',
      'error' => 'fa fa-fw fa-times-circle',
      'warning' => 'fa fa-fw fa-exclamation-triangle',
      'notice' => 'fa fa-fw fa-exclamation-circle',
      'info' => 'fa fa-fw fa-info-circle',
      'debug' => 'fa fa-fw fa-life-ring',
    ),
    'colors' => 
    array (
      'levels' => 
      array (
        'empty' => '#D1D1D1',
        'all' => '#8A8A8A',
        'emergency' => '#B71C1C',
        'alert' => '#D32F2F',
        'critical' => '#F44336',
        'error' => '#FF5722',
        'warning' => '#FF9100',
        'notice' => '#4CAF50',
        'info' => '#1976D2',
        'debug' => '#90CAF9',
      ),
    ),
    'highlight' => 
    array (
      0 => '^#\\d+',
      1 => '^Stack trace:',
    ),
    'facade' => 'LogViewer',
  ),
  'logging' => 
  array (
    'default' => 'daily',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'E:\\laragon\\www\\packr\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'E:\\laragon\\www\\packr\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'E:\\laragon\\www\\packr\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.hostinger.com',
    'port' => '465',
    'from' => 
    array (
      'address' => 'haider.ali@tcawglobal.com',
      'name' => 'ShipEarn',
    ),
    'encryption' => 'ssl',
    'username' => 'haider.ali@tcawglobal.com',
    'password' => 'Taneez89',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'E:\\laragon\\www\\packr\\resources\\views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'paypal' => 
  array (
    'client_id' => 'Ae0X-d4Gg-T8zOVBHdl_R_Tc6WDrACHVndgiP--QgEirgrEGyiqac8CA9qQSRcMkwBDjleq02zE1oj1z',
    'secret' => 'EOyOXpcKg1HYJiNdS5DYrrzVc23IvMjr14_86p5ku4X_BfZFuO4U-3o6sxbTTcfurxXe6c90d4eHctrc',
    'settings' => 
    array (
      'mode' => 'sandbox',
      'http.ConnectionTimeOut' => 1000,
      'log.LogEnabled' => true,
      'log.FileName' => 'E:\\laragon\\www\\packr\\storage/logs/paypal.log',
      'log.LogLevel' => 'FINE',
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
    'cache_expiration_time' => 1440,
    'log_registration_exception' => true,
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'scribe' => 
  array (
    'type' => 'static',
    'static' => 
    array (
      'output_path' => 'public/docs',
    ),
    'laravel' => 
    array (
      'add_routes' => true,
      'docs_url' => '/docs',
      'middleware' => 
      array (
      ),
    ),
    'auth' => 
    array (
      'enabled' => true,
      'in' => 'bearer',
      'name' => 'token',
      'use_value' => NULL,
      'extra_info' => 'You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.',
    ),
    'intro_text' => 'Welcome to our Laravel Starter API documentation!

<aside>As you scroll, you\'ll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile), and you can switch the programming language of the examples with the tabs in the top right (or from the nav menu at the top left on mobile).</aside>',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
    ),
    'base_url' => '',
    'title' => NULL,
    'description' => '',
    'postman' => 
    array (
      'enabled' => true,
      'base_url' => 'http://127.0.0.1:8000',
      'description' => NULL,
      'auth' => NULL,
    ),
    'openapi' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'default_group' => 'Endpoints',
    'logo' => false,
    'router' => 'laravel',
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'domains' => 
          array (
            0 => '*',
          ),
          'prefixes' => 
          array (
            0 => 'api/*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
        ),
        'apply' => 
        array (
          'headers' => 
          array (
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ),
          'response_calls' => 
          array (
            'methods' => 
            array (
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
            ),
            'cookies' => 
            array (
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
            'fileParams' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'faker_seed' => NULL,
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
      ),
      'urlParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromRouteRules',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderTag',
      ),
      'bodyParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseTag',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        4 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls',
      ),
      'responseFields' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldTag',
      ),
    ),
    'routeMatcher' => 'Knuckles\\Scribe\\Matching\\RouteMatcher',
    'continue_without_database_transactions' => 
    array (
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'bitbucket' => 
    array (
      'active' => false,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
    ),
    'facebook' => 
    array (
      'active' => true,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
      'fields' => 
      array (
      ),
    ),
    'github' => 
    array (
      'active' => false,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
    ),
    'google' => 
    array (
      'active' => true,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
    ),
    'linkedin' => 
    array (
      'active' => false,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
      'fields' => 
      array (
      ),
    ),
    'twitter' => 
    array (
      'active' => true,
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
      'scopes' => 
      array (
      ),
      'with' => 
      array (
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'E:\\laragon\\www\\packr\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'shipearn_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
    'timeout_status' => true,
    'timeout' => 600,
  ),
  'user-review' => 
  array (
    'star' => 5,
    'fake' => 
    array (
      'enabled' => false,
      'star' => 5,
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'E:\\laragon\\www\\packr\\resources\\views',
    ),
    'compiled' => 'E:\\laragon\\www\\packr\\storage\\framework\\views',
  ),
  'self-diagnosis' => 
  array (
    'environment_aliases' => 
    array (
      'prod' => 'production',
      'live' => 'production',
      'local' => 'development',
    ),
    'checks' => 
    array (
      0 => 'BeyondCode\\SelfDiagnosis\\Checks\\AppKeyIsSet',
      1 => 'BeyondCode\\SelfDiagnosis\\Checks\\CorrectPhpVersionIsInstalled',
      'BeyondCode\\SelfDiagnosis\\Checks\\DatabaseCanBeAccessed' => 
      array (
        'default_connection' => true,
        'connections' => 
        array (
        ),
      ),
      'BeyondCode\\SelfDiagnosis\\Checks\\DirectoriesHaveCorrectPermissions' => 
      array (
        'directories' => 
        array (
          0 => 'E:\\laragon\\www\\packr\\storage',
          1 => 'E:\\laragon\\www\\packr\\bootstrap/cache',
        ),
      ),
      2 => 'BeyondCode\\SelfDiagnosis\\Checks\\EnvFileExists',
      3 => 'BeyondCode\\SelfDiagnosis\\Checks\\ExampleEnvironmentVariablesAreSet',
      'BeyondCode\\SelfDiagnosis\\Checks\\LocalesAreInstalled' => 
      array (
        'required_locales' => 
        array (
          0 => 'en_US',
          1 => 'en_US.utf8',
        ),
      ),
      4 => 'BeyondCode\\SelfDiagnosis\\Checks\\MaintenanceModeNotEnabled',
      5 => 'BeyondCode\\SelfDiagnosis\\Checks\\MigrationsAreUpToDate',
      'BeyondCode\\SelfDiagnosis\\Checks\\PhpExtensionsAreInstalled' => 
      array (
        'extensions' => 
        array (
          0 => 'openssl',
          1 => 'PDO',
          2 => 'mbstring',
          3 => 'tokenizer',
          4 => 'xml',
          5 => 'ctype',
          6 => 'json',
        ),
        'include_composer_extensions' => true,
      ),
      6 => 'BeyondCode\\SelfDiagnosis\\Checks\\StorageDirectoryIsLinked',
    ),
    'environment_checks' => 
    array (
      'development' => 
      array (
        0 => 'BeyondCode\\SelfDiagnosis\\Checks\\ComposerWithDevDependenciesIsUpToDate',
        1 => 'BeyondCode\\SelfDiagnosis\\Checks\\ConfigurationIsNotCached',
        2 => 'BeyondCode\\SelfDiagnosis\\Checks\\RoutesAreNotCached',
        3 => 'BeyondCode\\SelfDiagnosis\\Checks\\ExampleEnvironmentVariablesAreUpToDate',
      ),
      'production' => 
      array (
        0 => 'BeyondCode\\SelfDiagnosis\\Checks\\ComposerWithoutDevDependenciesIsUpToDate',
        1 => 'BeyondCode\\SelfDiagnosis\\Checks\\ConfigurationIsCached',
        2 => 'BeyondCode\\SelfDiagnosis\\Checks\\DebugModeIsNotEnabled',
        'BeyondCode\\SelfDiagnosis\\Checks\\PhpExtensionsAreDisabled' => 
        array (
          'extensions' => 
          array (
            0 => 'xdebug',
          ),
        ),
        3 => 'BeyondCode\\SelfDiagnosis\\Checks\\RoutesAreCached',
      ),
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => true,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
    'client_uuids' => false,
    'personal_access_client' => 
    array (
      'id' => NULL,
      'secret' => NULL,
    ),
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
      ),
    ),
  ),
  'web-tinker' => 
  array (
    'path' => '/tinker',
    'theme' => 'auto',
    'enabled' => true,
    'output_modifier' => 'Spatie\\WebTinker\\OutputModifiers\\PrefixDateTime',
    'config_file' => NULL,
  ),
  'captcha' => 
  array (
    'siteKey' => '',
    'secretKey' => '',
    'options' => 
    array (
      'hideBadge' => false,
      'dataBadge' => 'bottomright',
      'timeout' => '5',
      'debug' => false,
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
  'ide-helper' => 
  array (
    'filename' => '_ide_helper.php',
    'meta_filename' => '.phpstorm.meta.php',
    'include_fluent' => false,
    'include_factory_builders' => false,
    'write_model_magic_where' => true,
    'write_model_external_builder_methods' => true,
    'write_model_relation_count_properties' => true,
    'write_eloquent_model_mixins' => false,
    'include_helpers' => false,
    'helper_files' => 
    array (
      0 => 'E:\\laragon\\www\\packr/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => 
    array (
      0 => 'app',
    ),
    'ignored_models' => 
    array (
    ),
    'extra' => 
    array (
      'Eloquent' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'Illuminate\\Database\\Query\\Builder',
      ),
      'Session' => 
      array (
        0 => 'Illuminate\\Session\\Store',
      ),
    ),
    'magic' => 
    array (
    ),
    'interfaces' => 
    array (
    ),
    'custom_db_types' => 
    array (
    ),
    'model_camel_case_properties' => false,
    'type_overrides' => 
    array (
      'integer' => 'int',
      'boolean' => 'bool',
    ),
    'include_class_docblocks' => false,
    'force_fqn' => false,
    'additional_relation_types' => 
    array (
    ),
  ),
);

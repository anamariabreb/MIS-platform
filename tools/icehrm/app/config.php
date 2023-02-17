<?php
ini_set('error_log', 'data/icehrm.log');

define('APP_NAME', 'Ice Hrm');
define('FB_URL', 'Ice Hrm');
define('TWITTER_URL', 'Ice Hrm');

define('CLIENT_NAME', 'app');
define('APP_BASE_PATH', '/Applications/XAMPP/xamppfiles/htdocs/MIS-platform/tools/icehrm/core/');
define('CLIENT_BASE_PATH', '/Applications/XAMPP/xamppfiles/htdocs/MIS-platform/tools/icehrm/app/');
define('BASE_URL','http://localhost/MIS-platform/tools/icehrm/web/');
define('CLIENT_BASE_URL','http://localhost/MIS-platform/tools/icehrm/app/');

define('APP_DB', 'Comp8-icehrm');
define('APP_USERNAME', 'anamaria');
define('APP_PASSWORD', 'testing123');
define('APP_HOST', 'localhost');
define('APP_CON_STR', 'mysqli://'.APP_USERNAME.':'.APP_PASSWORD.'@'.APP_HOST.'/'.APP_DB);

//file upload
define('FILE_TYPES', 'jpg,png,jpeg');
define('MAX_FILE_SIZE_KB', 10 * 1024);

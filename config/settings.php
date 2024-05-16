<?php
require_once dirname(__FILE__) . '/config.php';
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost:4000');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'mysql');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'docker');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', 'computadora');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'web');
}

define('JS_URL', BASE_URL . '/assets/js');
define('CSS_URL', BASE_URL . '/assets/css');
define('IMG_URL', BASE_URL . '/assets/img');
define('IMG_FILES', BASE_URL . '/assets/files');
define('APP_UPLOAD_FILE', BASE_URL.'/uploads/');
define('APP_UPLOAD_FILE_RELATIVE', './uploads/');

// GOOGLE
define('GOOGLE_CLIENT_ID', '1077359957652-no1d8dtejbfojpjtosr0cmtdumc3rk9n.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '6LQEOkjs8mGt7F2l7LSwG5jl');
define('GOOGLE_REDIRECT_URL', BASE_URL . '/login');
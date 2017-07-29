<?php
/**
 * Craft web bootstrap file
 */

switch($_SERVER['HTTP_HOST']) {
    case 'api.craftcms.com':
    case 'api.craftcms.dev':
        define('CRAFT_SITE', 'api');
        break;
    case 'composer.craftcms.com':
    case 'composer.craftcms.dev':
        define('CRAFT_SITE', 'composer');
        break;
    case 'id.craftcms.com':
    case 'id.craftcms.dev':
        define('CRAFT_SITE', 'craftId');
        break;
}

define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

// Composer autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';

// dotenv
if (!isset($_SERVER['RDS_HOSTNAME'])) {
    $dotenv = new Dotenv\Dotenv(dirname(CRAFT_VENDOR_PATH));
    $dotenv->load();
}

$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();

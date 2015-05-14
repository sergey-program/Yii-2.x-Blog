<?php

define('DS', DIRECTORY_SEPARATOR);
define('FILE_PATH_ROOT_WEB', __DIR__ . DS);
define('FILE_PATH_ROOT', FILE_PATH_ROOT_WEB . '..' . DS);
define('FILE_PATH_ROOT_UPLOAD', FILE_PATH_ROOT_WEB . 'uploads' . DS);
define('FILE_PATH_VENDOR', FILE_PATH_ROOT . 'vendor' . DS);

// folder for config
$sEnvironment = 'test';
$sEnvironment = file_exists(FILE_PATH_ROOT . '.dev') ? 'dev' : $sEnvironment;
$sEnvironment = file_exists(FILE_PATH_ROOT . '.prod') ? 'prod' : $sEnvironment;
defined('YII_ENV') or define('YII_ENV', $sEnvironment);

// debug mode
$bDebug = ($sEnvironment == 'test' || $sEnvironment == 'dev') ? true : false;
defined('YII_DEBUG') or define('YII_DEBUG', $bDebug);

if ($sEnvironment != 'prod') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

define('FILE_PATH_CONFIG', FILE_PATH_ROOT . 'config' . DS);
define('FILE_PATH_CONFIG_ENV', FILE_PATH_CONFIG . $sEnvironment . DS);

require(FILE_PATH_VENDOR . 'autoload.php');
require(FILE_PATH_VENDOR . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php');

$aConfig = require(FILE_PATH_CONFIG_ENV . 'main_site.php');

$oApplication = new yii\web\Application($aConfig);
$oApplication->run();
<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
// comment out the following two lines when deployed to production
// DEV mode
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

// PROD mode
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
//require(__DIR__ . '/../function.php');

$config = require(__DIR__ . '/../config/web.php');



(new yii\web\Application($config))->run();

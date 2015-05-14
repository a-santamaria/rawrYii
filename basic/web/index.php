<?php

// comment out the following two lines when deployed to production
$request_body = file_get_contents('php://input');
$json_array = json_decode($request_body, true);
echo "manager";
echo $json_array;
/*
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
*/

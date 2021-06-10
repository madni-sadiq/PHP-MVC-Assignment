<?php

use app\core\Application;
use app\controller\SiteController;
use app\controller\AuthController;

require_once __DIR__ . '/vendor/autoload.php';
$config = [ 'userClass' => \app\models\Users::class];

$app = new Application(__DIR__ , $config);


$app->db->applyMigrations();
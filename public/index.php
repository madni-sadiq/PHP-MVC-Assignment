<?php
use app\core\Application;
use app\controller\SiteController;
use app\controller\AuthController;

require_once __DIR__. '/../vendor/autoload.php';
$config = [ 'UserClass' => \app\models\Users::class];

$app = new Application(__DIR__.'/..', $config);

$app -> router -> get('/', [SiteController::class, 'Home']);
$app -> router -> get('/login',[AuthController::class, 'login']);
$app -> router -> post('/login',[AuthController::class, 'login']);
$app -> router -> get('/Studentregister',[AuthController::class, 'StudentRegister']);
$app -> router -> post('/Studentregister',[AuthController::class, 'StudentRegister']);
$app -> router -> get('/Teacherregister',[AuthController::class, 'TeacherRegister']);
$app -> router -> post('/Teacherregister',[AuthController::class, 'TeacherRegister']);
$app -> router -> get('/contact',[SiteController::class, 'contact']);
$app -> router -> post('/contact', [SiteController::class, 'contact']);
$app -> router -> get('/logout',[AuthController::class, 'logout']);
$app -> router -> get('/subjectAdd',[AuthController::class, 'subjectAdd']);
$app -> router -> post('/subjectAdd',[AuthController::class, 'subjectAdd']);
$app -> router -> get('/SubjectJoin',[AuthController::class, 'subjectJoin']);
$app -> router -> post('/Enroll',[AuthController::class, 'Enroll']);
$app->run();
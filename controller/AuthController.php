<?php


namespace app\controller;


use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\StudentModel;
use app\models\SubjectModel;
use app\models\TeacherModel;
use app\models\Users;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['subjectAdd']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request -> isPost()){
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model'=>$loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new Users();
        if ($request->isPost())
        {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model'=> $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model'=> $user
        ]);

    }

    public function StudentRegister(Request $request)
    {
        $user = new StudentModel();
        if ($request->isPost())
        {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('StudentRegister', [
                'model'=> $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('StudentRegister', [
            'model'=> $user
        ]);

    }

    public function TeacherRegister(Request $request)
    {
        $user = new TeacherModel();
        if ($request->isPost())
        {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('TeacherRegister', [
                'model'=> $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('TeacherRegister', [
            'model'=> $user
        ]);

    }
    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function subjectAdd(Request $request){
        $subject = new SubjectModel();
        if ($request->isPost())
        {
            $subject->loadData($request->getBody());

            if ($subject->validate() && $subject->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('subjectAdd', [
                'model'=> $subject
            ]);
        }
        $this->setLayout('auth');
        return $this->render('subjectAdd', [
            'model'=> $subject
        ]);
    }

}
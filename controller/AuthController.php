<?php


namespace app\controller;


use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\StudentEnrolls;
use app\models\StudentModel;
use app\models\SubjectModel;
use app\models\TeacherModel;
use app\models\Users;

class AuthController extends Controller
{
    public Users $user;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['subjectAdd']));
        $this->registerMiddleware(new AuthMiddleware(['SubjectJoin']));
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
        $this->user = new StudentModel();
        if ($request->isPost())
        {
            $this->user->loadData($request->getBody());

            if ($this->user->validate() && $this->user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('StudentRegister', [
                'model'=> $this->user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('StudentRegister', [
            'model'=> $this->user
        ]);

    }

    public function TeacherRegister(Request $request)
    {
        $this->user = new TeacherModel();
        if ($request->isPost())
        {
            $this->user->loadData($request->getBody());

            if ($this->user->validate() && $this->user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            return $this->render('TeacherRegister', [
                'model'=> $this->user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('TeacherRegister', [
            'model'=> $this->user
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
                Application::$app->session->setFlash('success', 'Subject Added Successfully');
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
    public function subjectJoin()
    {
        $this->setLayout('StudentLayout');
        $subjects=SubjectModel::retrieve();
        return $this->render('subjectJoin', [
            'subject' => $subjects
        ]);

    }

    public function Enroll(Request $request){
        $sid = $_POST['sid'];
        $email = $_SESSION['email'];
        $details = (array)SubjectModel::findOne(['id'=>$sid]);
        $Stime = $details['Stime'];
        $Etime = $details['Etime'];
        $new_enroll = new StudentEnrolls($Stime, $Etime,$email, $sid);

        if ($request->isPost()){
            if($new_enroll->validate()) {
                $new_enroll->save();
                Application::$app->response->redirect('/SubjectJoin');
            }
            else{
                Application::$app->session->setFlash('danger', 'You cannot Join this subject');
                Application::$app->response->redirect('/SubjectJoin');
            }
        }


    }
}
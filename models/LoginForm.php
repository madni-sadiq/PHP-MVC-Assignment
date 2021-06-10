<?php


namespace app\models;


use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public function rules(): array
    {
        return [
            'email' => [[self::RULE_REQUIRED], [self::RULE_EMAIL]],
            'password' => self::RULE_REQUIRED
        ];
    }

    public function labels(): array
    {
      return ['email' => 'Email', 'password' => 'Password'];
    }

    public function login()
    {
        $user = StudentModel::findOne(['email'=>$this->email]);
        if (!$user){
            $user = TeacherModel::findOne(['email' => $this->email]);
        }

        if (!$user){
            $this->addError('email', 'User with this Email does not exist');
            return false;
        }

        if (!password_verify($this->password, $user->password)){
            $this->addError('password', 'Incorrect Password');
            return false;
        }
        return Application::$app->login($user);
    }

}
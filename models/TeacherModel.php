<?php


namespace app\models;


class TeacherModel extends Users
{
    public string $department = '';
    public string $designation = '';

    public function tableName(): string
    {
        return 'teacher';
    }
    public function primaryKey(): string
    {
        return 'email';
    }
    public function rules(): array
    {
        return [
            'firstname' => self::RULE_REQUIRED,
            'lastname' => self::RULE_REQUIRED,
            'department' => self::RULE_REQUIRED,
            'designation' => self::RULE_REQUIRED,
            'email' => [[self::RULE_REQUIRED], [self::RULE_EMAIL], [self::RULE_EXIST, 'class'=>self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN,'min'=>'8'], [self::RULE_MAX, 'max'=>'24']],
            'ConfirmPassword'=>[self::RULE_REQUIRED, [self::RULE_MATCH, 'match'=>'password']]
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'department',
            'designation',
            'email',
            'password',
            'status'
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'department'=> 'Department',
            'designation' => 'Designation',
            'email' => 'Email',
            'password' => 'Password',
            'ConfirmPassword' => 'Confirm Password'
        ];
    }

}
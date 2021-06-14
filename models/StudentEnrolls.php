<?php


namespace app\models;


use app\core\Application;
use app\core\Db\DBModel;

class StudentEnrolls
{
    public string $email = '';
    public int $Subject_id;
    public $Stime;
    public $Etime;

    public function __construct($Stime, $Etime,string $email, int $Subject_id)
    {
        $this->email = $email;
        $this->Stime = $Stime;
        $this->Etime = $Etime;
        $this->Subject_id = $Subject_id;
    }

    public function tableName(): string
    {
        return 'student_enroll';
    }

    public function primaryKey(): array
    {
        return ['email', 'Subject_id'];
    }
    public function attributes(){
        return [
            'email',
            'Subject_id',
            'Stime',
            'Etime'
        ];
    }
    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = DBModel::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
                    VALUES(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function findOne($where)
    {
        $tableName = self::tableName();
        $attribute = array_keys($where);

        $sql = implode(" AND ", array_map(fn($attr)=> "$attr = :$attr", $attribute));
        $statement = DBModel::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $item)
        {
            $statement->bindValue(":$key", $item);

        }

        $statement->execute();

        return $statement->fetchObject();
    }

    public function validate(){
        $subject_id = $this->Subject_id;
        $Stime = $this->Stime;
        $Etime = $this->Etime;
        $record = $this->validator(['Subject_id' => $subject_id, 'Stime'=>$Stime, 'Etime'=>$Etime]);
        return !$record;

    }



    public function validator($where)
    {
        $tableName = self::tableName();
        $email = Application::$app->session->get('email');
        $Stime = $where['Stime'];
        $Etime = $where['Etime'];

        $statement = DBModel::prepare("SELECT * FROM $tableName WHERE (email = '$email') AND (Stime < '$Stime' AND Etime > '$Stime')
                                                                                            OR (Stime < '$Etime' AND Etime > '$Etime');");

        $statement->execute();
        return (bool)$statement->fetchObject();
    }

}
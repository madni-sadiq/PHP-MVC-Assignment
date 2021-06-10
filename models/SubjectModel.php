<?php


namespace app\models;


use app\core\UserModel;

class SubjectModel extends UserModel
{
    public string $Sname = '';
    public string $Stime = '';
    public string $Etime = '';
    public string $email = '';

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
                    VALUES(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            if ($this->{$attribute} === ''){
                $statement->bindValue(":$attribute", $_SESSION['email']);
            }else {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
        }
        $statement->execute();
        return true;
    }


    public function attributes(): array
    {
        return [
            'Sname',
            'Stime',
            'Etime',
            'email'
        ];
    }

    public function getDisplayName(): string
    {
        return '';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'subject';
    }

    public function rules(): array
    {
        return [
            'Sname'=>self::RULE_REQUIRED,
            'Stime'=>self::RULE_REQUIRED,
            'Etime'=>self::RULE_REQUIRED
        ];
    }
    public function labels(): array
    {
        return [
            'Sname' => 'Subject Name',
            'Stime' => 'Start time',
            'Etime' => 'End time'
        ];
    }

}
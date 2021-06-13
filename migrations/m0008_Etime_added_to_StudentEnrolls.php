<?php


class m0008_Etime_added_to_StudentEnrolls
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student_enroll ADD COLUMN Etime TIME (0);";
        $db->pdo->exec($SQL);
    }

    public function down(){
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student_enroll DROP COLUMN Etime;";
        $db->pdo->exec($SQL);
    }
}
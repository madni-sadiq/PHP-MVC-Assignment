<?php


class m0008_Stime_added_to_StudentEnrolls
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student_enroll ADD COLUMN Stime TIME (0);";
        $db->pdo->exec($SQL);
    }

    public function down(){
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student_enroll DROP COLUMN Stime;";
        $db->pdo->exec($SQL);
    }
}
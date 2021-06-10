<?php


class m0004_addPasswordinStudent
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student ADD COLUMN password VARCHAR(512) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down(){
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE student DROP COLUMN password;";
        $db->pdo->exec($SQL);
    }

}
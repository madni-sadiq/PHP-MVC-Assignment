<?php


class m0006_SubjectTable
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE subject (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                Sname VARCHAR(255) NOT NULL,
                Stime TIME(0),
                Etime TIME(0) 
    ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE subject ;";
        $db->pdo->exec($SQL);

    }

}
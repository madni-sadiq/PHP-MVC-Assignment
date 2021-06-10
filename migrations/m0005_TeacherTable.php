<?php


class m0005_TeacherTable
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE teacher (
                id INT AUTO_INCREMENT PRIMARY KEY,
                department VARCHAR(255) NOT NULL,
                designation VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                status  TINYINT NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                password VARCHAR(512) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE teacher ;";
        $db->pdo->exec($SQL);

    }

}
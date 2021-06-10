<?php


class m0003_addStudentTable
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE student (
                id INT AUTO_INCREMENT PRIMARY KEY,
                department VARCHAR(255) NOT NULL,
                section VARCHAR(255) NOT NULL,
                rollno VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                status  TINYINT NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE student ;";
        $db->pdo->exec($SQL);

    }
}
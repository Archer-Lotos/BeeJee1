<?php

namespace Configs;

use PDO;

class DataBaseConfig
{
    public static $db_mysql_config = [
        'pdo_url' => "mysql:host=localhost;dbname=taskmanager2",
        'username' => 'taskmanager2',
        'password' => 'ykggy8tf689tfDD',
        'options' => [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ],
    ];

    public static $sql_migrate = "
    CREATE TABLE IF NOT EXISTS tasks
    (
        id int(11) auto_increment
        primary key,
        username varchar(100) not null,
        email varchar(100) null,
        description varchar(1000) not null,
        isModified tinyint(1) default 0 not null,
        isDone tinyint(1) default 0 null
        )

    ";
}

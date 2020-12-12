<?php

namespace Http\Models;

use PDO;

use Configs\DataBaseConfig;

abstract class Model
{
    protected $db;

    public function __construct()
    {

        $this -> db = new PDO(
            DataBaseConfig::$db_mysql_config['pdo_url'],
            DataBaseConfig::$db_mysql_config['username'],
            DataBaseConfig::$db_mysql_config['password'],
            DataBaseConfig::$db_mysql_config['options']
        );
    }

    protected function migrate()
    {
        $this->db->exec(DataBaseConfig::$sql_migrate);
    }

    abstract function getData();
}
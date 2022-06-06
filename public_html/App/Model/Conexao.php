<?php

namespace App\Model;

class Conexao
{
    private static $instance;

    public static function getConn()
    {
        $user = "dts";
        $pass = "8y17tzps@Application@Admin";

        $options = [

            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
            \PDO::ATTR_ORACLE_NULLS => \PDO::NULL_EMPTY_STRING

        ];

        try {

            self::$instance = new \PDO('mysql:host=127.0.0.1;dbname=precad', $user, $pass, $options);
        }
        catch(\PDOException $exception) {
            return die("Database Failed to Connection: ".$exception->getMessage());
        }
        return self::$instance;
    }
}

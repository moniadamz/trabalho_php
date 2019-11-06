<?php

    class Conexao
    {
        private function __construct()
        {}
     
        public static function getInstance()
        {
            $host = 'localhost';
            $name = 'root';
            $password = '';
            $database = 'projeto';
            try {
                $link = new PDO('mysql:dbname=' . $database . ';host=' . $host . ';charset=utf8', $name, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $link;
            } catch (PDOException $ex) {
                die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
            }
        }
    }
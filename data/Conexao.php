<?php
namespace data;

require("config.php");


use PDO;
use PDOException;

//classe de conexão
class Conexao
{
    private function getConnection() {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $ex) {
            throw new \Exception("->Erro connection database<-");
        }
    }

    public function acessa(){
        return $this->getConnection();
    }
}

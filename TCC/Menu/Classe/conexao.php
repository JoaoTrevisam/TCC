<?php

class Db {
    
    public static function conexao(){
     
        try {
            $conexao = new PDO("mysql:host=localhost;dbname=heman;", "root", "");
            return $conexao;
        } catch (\Throwable $th) {
            return NULL;
        }
    }
}
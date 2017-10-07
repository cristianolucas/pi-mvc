<?php

/**
 * Description of Localizacao
 *
 * @author Diego
 */
class ConexaoDAO {
    private static $host = "localhost";
    private static $user = "postgres";
    private static $password = "1234";
    private static $dbname = "pi";
    
    
    public static function getConexao() {
        return pg_connect("host=" . ConexaoDAO::$host
                . " user=" . ConexaoDAO::$user
                . " password=" . ConexaoDAO::$password
                . " dbname=" . ConexaoDAO::$dbname);
    }
}

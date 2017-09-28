<?php

class ConexaoDAO {
    private static $host = "localhost";
    private static $user = "postgres";
    private static $password = "1234";
    private static $dbname = "pi";
    
    
    public function getConexao() {
        return pg_connect("Localhost=" . $this->host
                . "user=" . $this->user
                . "password=" . $this->password
                . "dbname=" . $this->dbname);
    }
}

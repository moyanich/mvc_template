<?php

class Connection {

    private $host = 'localhost';
    private $dbuser = 'root';
    private $dbPassword = 'root';
    private $dbName = 'empmanagedb';
    private $port = '8889';
    /*private $session_name = 'user';
    private $remember = '';
    private $cookie_name = 'hash';
    private $cookie_expiry = '604800'; */

    protected function connect() {
        $dsn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->dbuser, $this->dbPassword);
        $dsn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dsn;
    }
}

      
?>


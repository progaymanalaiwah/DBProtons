<?php

trait connect {
    private $con,$hostname,$username,$password,$name,$charset,$port,$options;

    private function connect(){

        /*----- Set Variabels Connect Database -----*/
        $this->hostname = DB_HOSTNAME;
        $this->port     = DB_PORT;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->name     = DB_NAME;
        $this->charset  = DB_CHARSET;
        
        $dsn = "mysql:host={$this->hostname};dbname={$this->name};port={$this->port};charset={$this->charset}";

        // Content Options Class Pdo
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', # Option Encoding Utf8
        );

        try{

            $dbh = new PDO($dsn,$this->username,$this->password,$options);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $dbh;

        }catch(PDOException  $e){

            // If Error Connect Database Echo That Error/s
            echo $e->getMessage();
            return FALSE;

        }
    }

    # return Connect Database
    public function con(){
        return $this->con;
    }
}

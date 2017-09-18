<?php

/** ----------------------------------------------
 * DBProtons - Library Php  To Mysql Database
 * Description : 
 *  This library used in execute query mysql database 
 *  in a way very very easy you do not need to write any query
 *  You need to type the name of the function to execute any query in the Mysql DataPase
 * @package DBProtons @version 1.0.0 
 * @author Ayman Alaiwah
 * My Facebook      : https://www.fb.com/progaymanalaiwah
 * My github        : https://github.com/progaymanalaiwah
 * DBProtons Github : https://github.com/progaymanalaiwah/DBProtons
 ---------------------------------------------- **/

// Include File autoload
require_once __DIR__."/inc/autoload.php";

class DBProtons implements
                        interfaceFunctions , # Intert face function 
                        interfaceWhere ,     # Interface where
                        interfaceSelect,     # Interface Select
                        interfaceInsert      # Interface Insert
                         {

    // Inheritance Traits
    use connect,functions,where,select,insert,escape;

    private $con; // Variable inside connect database

    public function __construct(){

        # Inside this variable connect database
        $this->con = $this->connect();

    }

    public function __destruct(){

        # Close Connect Databse
        $this->con = "null";

    }
}

<?php 

/**
 * This file contains a lot of examples 
 * in the work insert in mysql database
 */

// include librar DBProtons 
require_once __DIR__."/DBProtons/DBProtons.php";

// Create Object from class DBProtons
$DB = new DBProtons();

/** 
 * Functions Insert 
 * 1- insert
 * 2- insertArray
 * 3- lastinsertId
 */

# -------------------- Examples -------------------------- #

/** 
 * Work Function insert
 * $DB->insert( string $table , array columnAndVlaue )
 * return true or false
*/

$columnAndValue = array(

    # Columns     values
    'username' => 'admin',
    'password' => '1235461',
    'email'    => 'admin@gmail.com'

);

$result = $DB->insert('users',$columnAndValue);

echo $DB->lastinsertId(); # get last id insert 
# ---------------------------------------------------- #

/** 
 * Work Function insertArray
 * $DB->insertArray( string $table , array column , array values )
 * return true or false
*/

# columns
$column = array(   
        'username' ,
        'password' ,
        'email'    
    );

    # values columns
$values = array(
    ['username','password','email'],
    ['nor','not12346','nor@gmail.com'],
    ['ali','ali126','ali@gmail.com'],
    ['ayman','ayman1256','ayma@gmail.comn']
);

$result = $DB->insertArray('users',$column,$values);

echo $DB->lastinsertId(); # get last id insert 

# ----------------------------------------------------- #

/** 
 * Work Function lastinsertId()
 * It used get last id insert in database 
 * execute function before execute function insert or insertArray
 * $DB->lastinsertId();
 * return true or false
*/

echo $DB->lastinsertId();
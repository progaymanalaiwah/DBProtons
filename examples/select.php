<?php 

/**
 * This file contains a lot of examples 
 * in the work select in mysql database
 */

// include librar DBProtons 
require_once __DIR__."/DBProtons/DBProtons.php";

// Create Object from class DBProtons
$DB = new DBProtons();

/** 
 * Functions Insert 
 *  1- select
 *  2- from
 *  3- get
 *  4- getAll
 *  5- selectMax
 *  6- selectMin
 *  7- selectSum
 *  8- selectAvg
 *  9- join
 * 10- innerJoin
 * 11- rightJoin
 * 12- like
 * 13- notLike
 */


# -------------------- Examples -------------------------- #

/** 
 * Work Function select 
 * $DB->select(string select = "*")
*/

// $DB->select("username,password"); // SELECT username,password FROM users
// $DB->select("password"); // SELECT password FROM users
// $DB->select("*"); // SELECT * FROM users By Default
# ---------------------------------------------------------- #

/** 
 * Work Function from 
 * $DB->from(string from)
*/

// $DB->from("orders"); // SELECT username,password FROM orders
// $DB->from("users"); // SELECT password FROM users
// $DB->from("product"); // SELECT * FROM product

# ---------------------------------------------------------- #


/** 
 * Work Functions 
 * $DB->selectMax( string column , string asTable = NULL optional );
 * $DB->selectMin( string column , string asTable = NULL optional );
 * $DB->selectSum( string column , string asTable = NULL optional);
 * $DB->selectAvg( string column , string asTable = NULL optional );
*/

// $DB->from('users')  
// $DB->selectMax('userID') // SELECT MAX(userID) AS userID FROM users
// $DB->selectMIN('userID','MIN') // SELECT MAX(userID) AS MIN FROM users
// $DB->selectSUM('userID','SumUserID') // SELECT MAX(userID) AS SumUserID FROM users
// $DB->selectAVG('userID','AVGUserID') // SELECT MAX(userID) AS AVGUserID FROM users


# ---------------------------------------------------------- #

/** 
 * Get Data from database must use get or getAll 
 * get ( string from , boolean array = FALSE ) array type return if false return object if true return array
 * getAll ( string from , boolean array = FALSE ) array type return if false return object if true return array
 *
 */


/*
 $result = $DB->get('users'); // get onw row of data from table users return object
 Query : SELECT * FROM users
 $result->result(); 
 
 $result = $DB->get('users',true); // get all data from table users return array
 $result->result(); 

 $result = $DB->select('users')->from('order')->getAll('',true);
 $result->result();
 query : SELECT users FROM order
*/

# ----------------------------------------------------------- # 

/**
 * $table Name table join  $where order.UserID = user.UserID
 * join($table,$where,$typeJoin = 'innerJoin') $typeJoin bydefault innerJoin [ left , right ]
 * innerJoin($table,$where);
 * leftJoin($table,$where);
 * rightJoin($table,$where);
 */

 /*
 
$DB->join('order','order.UserID = user.UserID')->getAll('users');
query : SELECT * FORM users INNER JOIN order ON order.UserID = user.UserID

$DB->join('order','order.UserID = user.UserID','left')->getAll('users');
query : SELECT * FORM users LEFT JOIN order ON order.UserID = user.UserID

$DB->innerJoin('order','order.UserID = user.UserID')->getAll('users');
query : SELECT * FORM users RIGHT JOIN order ON order.UserID = user.UserID

$DB->leftJoin('order','order.UserID = user.UserID')->getAll('users');
query : SELECT * FORM users LEFT JOIN order ON order.UserID = user.UserID
*/


#- ------------------------------------------------------ #

/**
 * like($column,$like);
 * notLike($column,$like);
 *
 */

 /*
 $DB->like('username'," '%a%' or '%mahmoud%' or '%_a%'")->getAll('users')
 query : SELECT * FROM users WHERE username LIKE %a% or %mahmoud% or %_a%

 $DB->notlike('username'," '%a%' or '%mahmoud%' or '%_a%'")->getAll('users');
 query : SELECT * FROM users WHERE username NOT LIKE %a% or %mahmoud% or %_a%
 */


 /*
 
 $DB->select('*')
    ->from('users')
    ->where(array('username'=>'ali %AND%','password'=>10))
    ->orderBy('userID')->limit(10)->getAll();

Query : SELECT * FROM users WHERE username = ali AND password 10 ORDER BY userID ASC LIMIT 10


Funcitons 
orderBy( string column , order by default ASC  | DESC)
limit( limit , offser = 0 optional )


rowCount( string from , array where optional)
$DB->rowCount('users'); return count users

$DB->rowCount('users',array('username'=> 'admin','password' => 10)); 
if username and password found in database return one else return 0 

or 
$DB->where(array('username'=> 'admin','password' => 10));
$DB->rowCount('users'); 

 
 */
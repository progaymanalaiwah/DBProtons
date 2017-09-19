# DBProtons

## Description
It helps you handle MySQL databases where you do not have to write any query you just need to write a functions Perform any query in the database Using this library, Database handling will become easier and without any complexity

## Tbale Content

 ### The functions used to fetch data from datapase

   * select
   * form
   * selectMax
   * selectMin
   * selectAvg
   * selectSum
   * get
   * getAll
   * join
   * innerJoin
   * rightJoin
   * leftJoin
   * like
   * notLike
   * orderBy
   * limit
   * rowCount
   * query
   * result

 ###  functions used to Add where to Query it functions used with select , updaate and delete 

   * where
   * whereNot
   * orWhere
   * andWhere
   * whereIn
   * whereNotIn
   * groupStart
   * groupEnd
   * groupStartAnd
   * groupStartOr

 ### Functions insert data to database

  * insert
  * insertArray
  * lastInsertId

 ### Funciton update and delete 
  * update 
  * delete
  
 ### Funciton esc
  * escString
  * escCode

## Installation
 * Dwonlaod Library DBProtons [Download](https://github.com/progaymanalaiwah/DBProtons/) <br>
 * Edit Information Connect Database From File ProtonsConfig in path <strong> DBProtons\inc\ProtonsConfig.php </strong> 
 ```php
 
   // Information Connect Database
  define('DB_HOSTNAME', 'localhost'); # Name Host By Default localhost 
  define('DB_USERNAME', 'root'); # Username Database By Default root
  define('DB_PASSWORD', ''); # Password Database
  define('DB_NAME', ''); # Name Database
  define('DB_CHARSET', 'utf8'); # charset by default utf8
  define('DB_PORT', '3306'); # Port By Default 3306
  
 ```
 * include library  
 ```php 
  require_once __DIR__."/DBProtons/DBProtons.php";
 ```
 * Create Object From Class DBProtons
 ```php
 $DB = new DBProtons();
 ```

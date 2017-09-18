<?php 

/*
 update($nameTabel,$columnAndValue,$where = null);
 delete($nameTabel,$where = null);


 update ( string $nameTabel , array $columnAndValue , array $where optional )

$DB->where(array(
    'userID' => "10 %AND%",
    'username !=' => 'nor'
));
$DB->update('users',array(
    'username'  => 'admin',
    'password'  => '10',
    'email'     => 'ayman@gmail.com' 
));

or 

$DB->update('users',array(
    'username'  => 'admin',
    'password'  => '10',
    'email'     => 'ayman@gmail.com' 
),array(
    'userID' => "10 %AND%",
    'username !=' => 'nor'
));

query :  UPDATE users SET `username` = 'admin',`password` = 10,`email` = 'ayman@gmail.com' WHERE userID = 10 AND username != 'nor'


-----------------------------------------

 delete(string $nameTabel,array $where = null)

 $DB->delete('users',array('userID' => 10));
 or 

 $DB->where(array('userID' => 10));
 $DB->delete('users');
 
 query " DELETE FROM users   WHERE userID = 10


 --------------
 query( string $query,$array = FALSE type return object by default if true array type return )

 $stmt = $DB->query('SELECT * FROM USERS');
 $stmt->fetch(); .....etc 
*/
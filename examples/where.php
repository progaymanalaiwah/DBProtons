<?php 

/*
    public function where($column,$value = null);
    public function whereNot($column,$value = null);
    public function orWhere( $column , $value = null );
    public function andWhere( $column , $value = null );
    public function whereIn($column,$in);
    public function whereNotIn($column,$in);
    public function groupStart();
    public function groupEnd();
    public function groupStartAnd();
    public function groupStartOr();

    --- Funciton Where ----
    where( string or array  $column , value optional if column was array )

    $DB->where('username','admin');
    $result = $DB->getAll('users')
    Query : SELECT * FROM users WHERE username = admin

    $DB->where(array(
        'username !=' => 'ali %OR%',
        'password'    => '123 %AND%',
        'email'       => 'aymanalaiwah %OR%',
        'userID > '   => 10
    ));

    $result = $DB->getAll('users')
    Query : SELECT * FROM users WHERE username != ali OR password = 123 AND email = aymanalaiwah OR userID > 10

    $DB->select('username,userID')
        ->form('emplayee')
        ->groupStart()
        ->andwhere('password','123')
        ->where('userID > ', 10)
        ->groupEnd()
        ->getAll();

    $result = $DB->getAll('users');
    Query : SELECT username,userID FROM users  WHERE ( password = 123 AND userID > 10   )   


    $DB->whereNot('users',array('ayman','alaiwa'))
    SELECT * FROM users  WHERE username  IN ('ayma','ali')  

    $DB->whereNotin('username',array('ayma','ali'))
    SELECT * FROM users   WHERE username NOT IN ('ayma','ali')  






















*/


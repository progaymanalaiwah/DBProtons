<?php

interface interfaceSelect
{
    public function select($select); 
    public function selectMax( $table , $asTable = NULL );
    public function selectMin( $table , $asTable = NULL );
    public function selectSum( $table , $asTable = NULL );
    public function selectAvg( $table , $asTable = NULL );
    public function from($from); 
    public function get($from,$array = FALSE); 
    public function getAll($from,$array = FALSE); 
    public function join($table,$where,$typeJoin = 'innerJoin');
    public function innerJoin($table,$where);
    public function leftJoin($table,$where);
    public function rightJoin($table,$where);
    public function like($column,$like);
    public function notLike($column,$like);

}
  
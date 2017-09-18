<?php

interface interfaceWhere
{
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

}
 
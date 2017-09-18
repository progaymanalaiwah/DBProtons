<?php

Trait select {
 
    private $select      = "*",
            $from        = null,
            $valueWhere  = array(),
            $query       = null,
            $join        = '',
            $queryString = null;

    /**
     * Function querySelect used work query select in database
     * @param $from By default null is optional if used function from else muse require
     * @return $stmt
     */
    private function querySelect($from = null){

        $this->ifWhere();
        if($from != null) { $this->from = $from;}
        $querySelect = "SELECT $this->select FROM $this->from $this->join  $this->query $this->orderBy $this->limit";
        $stmt = $this->con->prepare($querySelect);
        $stmt->execute($this->valueWhere);
        $this->queryString = $stmt->queryString ;
        $this->resetValue();
        return $stmt;

    }

    /** 
     * Funciton setSelect  the function select type 
     * select max or min or sum or avg or * or anything
     * @param $select [MAX|MAI|SUM|AVG] 
     * @param $table if $select anything [MAX|MAI|SUM|AVG] require 
     * @param $asTable optional
     */
    private function setSelect($select , $table  = NULL, $asTable = NULL ){
        if(preg_match("/(%MAX%|%MIN%|%SUM%|%AVG%)/",$select)){

            if($asTable == NULL){
                $asTable = $table;
            }
            $select = str_replace('%','',$select);        
            return  " $select($table) as $asTable "; 

        }else{
            return  $select;
        }
        
    }

    # Set value select By Default *
    public function select( $select = "*" ){
        $this->select = $this->setSelect($select);
        return $this;
    }

    /** 
     * Select MAX number 
     * @param $table name table 
     * @param $asTable as table name By Default His name 
     * shall be the same table 
     */
    public function selectMax( $table , $asTable = NULL ){
        $this->select = $this->setSelect("%MAX%",$table , $asTable);
        return $this;
    }

    /** 
     * Select MIN number 
     * @param $table name table 
     * @param $asTable as table name By Default His name 
     * shall be the same table 
     */
    public function selectMin( $table , $asTable = NULL ){
        $this->select = $this->setSelect("%MIN%",$table , $asTable);
        return $this;
    }

    /** 
     * Select SUM number 
     * @param $table name table 
     * @param $asTable as table name By Default His name 
     * shall be the same table 
     */
    public function selectSum( $table , $asTable = NULL ){
        $this->select = $this->setSelect("%SUM%",$table , $asTable);
        return $this;
    }


    /** 
     * Select AVG number 
     * @param $table name table 
     * @param $asTable as table name By Default His name 
     * shall be the same table 
     */
    public function selectAvg( $table , $asTable = NULL ){
        $this->select = $this->setSelect("%AVG%",$table , $asTable);
        return $this;
    }

    # set value from
    public function from($from){
        $this->from = $from;
        return $this;
    }

    /**
     * Funciton get one result from database mysql
     * @param $form optional if used function from else becomes require
     * @param $array this is param use select type return array or object
     *  - if true return  arary by default return it object
     */
    public function get( $from = null , $arary = FALSE){
        if($arary == TRUE){ $arary  = PDO::FETCH_ASSOC; }
        else{ $arary = PDO::FETCH_OBJ; }

        $this->result = $this->querySelect($from)->fetch($arary);
        return $this;
    }

    /**
     * Funciton getall  All result from database mysql
     * @param $form optional if used function from else becomes require
     * @param $array this is param use select type return array or object
     *  - if true return  arary by default return it object
     */
    public function getAll( $from = null , $arary = FALSE){
        if($arary == TRUE){ $arary  = PDO::FETCH_ASSOC; }
        else{ $arary = PDO::FETCH_OBJ; }

        $this->result = $this->querySelect($from)->fetchAll($arary);
        return $this;
    }
    
    public function join($table,$where,$typeJoin = 'innerJoin'){
        switch (strtolower($typeJoin)){
            case 'right':
                $typeJoin = 'RIGHT JOIN';
            break;
            case 'left':
                $typeJoin = 'LEFT JOIN';
            break;
            default:
                $typeJoin = 'INNER JOIN';
            break;
                
        }
        $this->join = "$typeJoin $table ON $where";
        return $this;
    }
    
    public function innerJoin($table,$where){
        $this->join($table,$where);
        return $this;
    }
    
    public function rightJoin($table,$where){
        $this->join($table,$where,'right');
        return $this;
    }
    
    public function leftJoin($table,$where){
        $this->join($table,$where,'left');
        return $this;
        
    }

    public function like($column,$like){
        $this->query = "WHERE $column LIKE $like";
        return $this;
    }

    public function notLike($column,$like){
        $this->query = "WHERE $column NOT  LIKE $like";
        return $this;
    }

}

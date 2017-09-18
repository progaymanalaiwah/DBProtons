<?php

Trait functions {

    private $result = null,
            $limit  = null,
            $orderBy= null;
        
    private function resetValue(){
        $this->limit  = null;
        $this->orderBy = null;
        $this->whereCase = FALSE;
        $this->select     = "*";
        $this->from       = null;
        $this->valueWhere = array();
        $this->query      = null;
        $this->join       = '';

    }

    # Get Query String Befor Execute Query
    public function getQueryString(){
        return $this->queryString;
    }

    public function orderBy($columns,$order = 'ASC'){
        if(is_array($columns)){
            $columns = implode(',',$columns);
        }

        if(strtoupper($order) != 'ASC' && strtoupper($order) != 'DESC' ){
            $order = "ASC";
        }

        $this->orderBy = " ORDER BY $columns $order ";
        return $this;
        
    }


    public function limit($limit,$offset = 0){
        if($offset == 0){
            $limit = $limit;
        }else{
            $limit =  $limit . "," .$offset;
        }
        $this->limit .= " LIMIT ". $limit;
        return $this;
    }

   /**
    * Function Query @version 1.0.0
    * Use it At Execute query sql to database
    * @param $query
    * @param $fetch this param used to determine the type of return accepted 3 options
    *   1 - TRUE return Array
    *   2 - FASLE return object This option by default
    *   3 - NUMBER return Number Column
    * @return $stmt
    */
    public function query($query,$array = FALSE){

        if($arary == TRUE){ $arary  = PDO::FETCH_ASSOC; }
        else{ $arary = PDO::FETCH_OBJ; }
        $stmt = $this->con->query($query,$array);
        return $stmt;

    }

    /**
     * Fucntion Delete @version 1.0.0
     * used Delete data from Database
     * @param $nameTabel name tabel you want to delete from it
     * @param $where used add where to delete or useing function where
     * @return $result TRUE OR FALSE
     */
    public function delete($nameTabel,$where = null){
        
        if($where !== null && is_array($where)){ $this->where($where); }
        $this->ifWhere();
        $query  = "DELETE FROM $nameTabel  $this->query";
        $stmt = $this->con->prepare($query);
        $this->sqlQuery = $stmt->queryString; // Set Query Inside variabel sqlQuery
        $result = $stmt->execute($this->valueWhere);
        $this->resetValue();
        return $result;

    }

    
    /**
     * Function Update @version 1.0.0
     * used At Work Update value At Database
     * @param $nameTabel name table [ String ] require
     * @param $columnAndValue   Arraue Content On Name Column And Value    [ Array ] require
     * @param $where [ Array ] is default if use function where if not use fucntion where is require
     */
     public function update($nameTabel,$columnAndValue,$where = null){

        $nameColumns = "";
        $conditionValueWhere = $this->valueWhere;
        $this->valueWhere = array();
        foreach ($columnAndValue as $nameColumn => $value) {

            # Add all vlaue column to array
            array_push($this->valueWhere,$value);
            $nameColumns .= "`$nameColumn` = ?,"; # This Variable inside name column

        }

        if($where !== null && $this->whereCase == FALSE){  $this->where($where); }
        else{

            foreach($conditionValueWhere as $condition){
                array_push($this->valueWhere,$condition);
            }
        }

        $this->ifWhere();
        $query = "UPDATE `$nameTabel` SET ".substr($nameColumns,0,-1)."  $this->query";
        $stmt = $this->con->prepare($query);
        $result = $stmt->execute($this->valueWhere);
        $this->resetValue();
        return $result;

    } // End Update

    /**
     * Function rowCount @version 1.0.0
     * this is it get number rows
     * @param $nameTabel  name tabel [ String ]
     * @param $where optional [ array ]
    */
    public function rowCount($from,$where = null){

        if($where != null){
            $this->where($where);
        }
        # Return Count Row
        $result = $this->querySelect($from)->rowCount();
        $this->resetValue();
        return $result;
    }

    # Return result Execute Query
    public function result() { return $this->result; }




} // End Trait

<?php 

Trait insert {

    /**
     * Function insert 
     * insert data to database
     * @param $nameTabel is require name tabel [ string ]
     * @param $columnAndValue is require  [ array ]
     *  -  array( 'password' => '123456', username' => 'aymanalaiwah')
     */
     public function insert($nameTabel,$columnAndValue){
        $values    = array(); // Values Column
        $columns    = "";
        $operator  = "";

        foreach ($columnAndValue as $column => $value) {
            array_push($values,$value);  // add Vlaues to array values
            $columns   .= "`$column`,";
            $operator .= "?,";
        }

        $query = "INSERT INTO `$nameTabel` (".substr($columns,0,-1).") VALUES  (".substr($operator,0,-1).") ";
        $stmt = $this->con->prepare($query);
        $result = $stmt->execute($values);
        $this->resetValue();
        return $result;
    }

    /**
     * Function insertArray @version 1.0.0
     * use of insert array to database
     * @param $nameTabel name table  [ String ]
     * @param $column column [ array ]
     * @param $values values column array([],[],[])
     */
     public function insertArray($nameTabel,$column,$values){
        if(!is_array($column) || !is_array($values)){
            echo "<p style='color:red'>Please Enter name column and value using array </p>";
            return FALSE;
        }

        $operator = "";
        for($i = 0;$i<count($column);$i++){ $operator.="?,"; }

        $query = "INSERT INTO `$nameTabel` (".implode(",",$column).") VALUES   (".substr($operator,0,-1).")";
        $stmt = $this->con->prepare($query);
        foreach ($values as  $value) {

            $result = $stmt->execute($value);
            if(!$result){
                return FALSE;
            }

        }
        $this->resetValue();
        return $result;
    }

    
   /**
    * Fucntion lastInsertId @version 1.0.0
    * get last insert Id
    * @return last insert Id 
    */
    public function lastInsertId(){
        return $this->con->lastInsertId();
    }

} // End Trait 
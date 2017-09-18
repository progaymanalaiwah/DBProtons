<?php

Trait where {
    private $whereCase = FALSE;

    private function checkValuesWhere($column,$value ,$condition = null){
        $this->whereCase = true;
        $comparativeProcesses = array("<",">","=","<=",">=","!=");
        $comparative = "=";
        if(strpos_array($column,$comparativeProcesses,-1)){
            $comparative = "";
        }else{$comparative = "=";}

        if($condition == null){
            $condition  = array('%AND%','%OR%','%AND NOT%','%OR NOT%');
            if(strpos_array(strtoupper($value),$condition,-1)){
                global $needle;
                if($needle == "%AND%"){
                    $condition = "AND";
                    $value = str_ireplace('%AND%','',$value);
                }elseif($needle == '%AND NOT%' ){
                    $condition = "AND NOT";
                    $value = str_ireplace('%AND NOT%','',$value);
                }elseif($needle == '%OR NOT%' ){
                    $condition = "OR NOT";
                    $value = str_ireplace('%OR NOT%','',$value);
                }else{
                    $value = str_ireplace('%OR%','',$value);
                    $condition = "OR";
                }
            }else{$condition = "";}
        }

        $this->query .= "$column $comparative ? $condition ";
        array_push($this->valueWhere,$value);

    } // End checkValuesWhere

    
    private function ifWhere() {
        if( $this->whereCase == TRUE){
            $where = $this->query;
            $this->query =  explode(' '," WHERE $where");
            $number = 0;
            foreach($this->query as $key => $query){
                if($query == "WHERE"){
                    if($number > 0){
                        unset($this->query[$key]);
                    }
                    $number++; 
                }
            }
            $this->query = implode(' ',$this->query);
        }
    }
    public function where ( $column , $value = null ){
        if(!is_array($column)){
            $this->checkValuesWhere($column,$value);
        }else{
            foreach ($column as $key => $value) {
                $this->checkValuesWhere($key,$value);
            }
        }
        return $this;
    } // End Where

    # example  select * form users where not username = 20
    public function WhereNot( $column , $value = null ){

        $this->query = "WHERE NOT ";
        $this->checkValuesWhere($column,$value);
        return $this;
    }

    # WHERE NO EXMPLW  select * form users where  username = 20 or password = 20
    public function orWhere( $column , $value = null ){
        $this->checkValuesWhere($column,$value,"OR");
        return $this;
    }

    # example  select * form users where  username = 20 and password = 20
    public function andWhere( $column , $value = null ){
        $this->checkValuesWhere($column,$value,"AND");
        return $this;
    }

    #  example  select * form users where username in (ayman,ali,nor)
    public function whereIn($column,$in){
        if(is_array($in)){
            $this->valueWhere = $in;
            $_in = "";
            foreach ($in as $in) {
                $_in .="?,";
            }
            $in = substr($_in,0,-1);
        }else{
            $in = $in;
        }
        $this->query .= "WHERE $column IN ($in)";
        return $this;
    }

    #  example  select * form users where username not in (ayman,ali,nor)
    public function whereNotIn($column,$in){

        if(is_array($in)){
            $this->valueWhere = $in;
            $_in = "";
            foreach ($in as $in) {
                $_in .="?,";
            }
            $in = substr($_in,0,-1);
        }else{
            $in = $in;
        }
        $this->query .= "WHERE $column NOT IN ($in)";
        return $this;
    }

    public function groupStart(){
        if(strpos($this->query,'WHERE ')){
            $this->query .= "( ";
        }
        else{
            $this->query .= "WHERE ( ";
        }
         return $this;
    }
    

    public function groupEnd(){ $this->query .= ") "; return $this;}
    public function groupStartAnd(){ $this->query .= "AND ( "; return $this;}
    public function groupStartOr(){ $this->query .= " OR ( "; return $this;}

} // End Trait

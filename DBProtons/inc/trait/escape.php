<?php 

Trait escape {
    public function escString($string){
        return $this->con->quote($string);
    }

    public function escCode($code){
        return htmlspecialchars($code);
    }
}
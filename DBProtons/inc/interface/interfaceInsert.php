
<?php 

interface interfaceinsert {
    public function insert($table,$columnAndValue);
    public function insertArray($nameTabel,$column,$values);
    public function lastInsertId();
} 
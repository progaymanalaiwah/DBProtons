<?php

interface interfaceFunctions
{
    public function result();
    public function orderBy($columns,$order = 'ASC');
    public function limit($columns,$order = 'ASC');
    public function query($query,$array = FALSE);
    public function delete($nameTabel,$where = null);
    public function update($nameTabel,$columnAndValue,$where = null);
    public function rowCount($nameTabel,$where = null);
    public function getQueryString();
}
 
<?php

class work
{
    public function __construct()
    {

    }

    public function all()
    {
        $list = [];
        $db = new DB();
        $req = $db->getInstance()->query('SELECT * FROM works');
        return $req->fetchAll();
    }
}

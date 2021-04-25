<?php

class Model
{
    private $tbl;
    private $fillable = '';
    private $fillData = '';
    
    protected function setModel($tbl)
    {
        $this->tbl = $tbl;
    }

    protected function getModel()
    {
        return $this->tbl;
    }

    protected function setFillable($fillable)
    {
        $fillData = [];
        $this->fillable = join(', ', $fillable);
        foreach ($fillable as $value) {
            $fillData[] = ':' . $value;
        }
        $this->fillData = join(', ', $fillData);
    }

    protected function getFillable()
    {
        return $this->fillable;
    }

    protected function getAllData()
    {
        $db = new DB();
        $req = $db->getInstance()->query('SELECT * FROM ' . $this->tbl);
        return $req->fetchAll();
    }

    protected function create($datas)
    {
        if (count($datas) == 0 || $this->fillable == '') {
            return false;
        }
        $db = new DB();
        $db = $db->getInstance();
        $query = $db->prepare("INSERT INTO " . $this->tbl . " (" . $this->fillable . ") VALUES (" . $this->fillData . ")");
        try {
            $db->beginTransaction();
            foreach ($datas as $row) {
                $query->execute($row);
            }
            $db->commit();
            return true;
        } catch (Exception $e) {
            $db->rollback();
            throw $e;
            return false;
        }
    }
}

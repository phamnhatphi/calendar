<?php
require_once 'model.php';

class Work extends Model
{
    private $tbl = 'works';
    private $fillable = ['work_name', 'location', 'start_date', 'end_date', 'status'];

    public function all()
    {
        $model = new Model();
        $model->setModel($this->tbl);
        return $model->getAllData();
    }

    public function insert($datas)
    {
        $model = new Model();
        $model->setModel($this->tbl);
        $model->setFillable($this->fillable);
        return $model->create($datas);
    }

    public function update($data)
    {
        $model = new Model();
        $model->setModel($this->tbl);
        $model->setFillable($this->fillable);
        return $model->update($data);
    }
}

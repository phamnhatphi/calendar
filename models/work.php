<?php
require_once 'model.php';

class Work extends Model
{
    private $tbl = 'works';
    private $fillable = ['work_name', 'location', 'start_date', 'end_date', 'status'];

    public function all()
    {
        $this->setModel($this->tbl);
        return $this->getAllData();
    }

    public function insertCalendar($datas)
    {
        $this->setModel($this->tbl);
        $this->setFillable($this->fillable);
        return $this->create($datas);
    }

    public function updateCalendar($data)
    {
        $this->setModel($this->tbl);
        $this->setFillable($this->fillable);
        return $this->update($data);
    }

    public function deleteCalendar($id)
    {
        $this->setModel($this->tbl);
        return $this->delete($id);
    }
}

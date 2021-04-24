<?php
require_once('controllers/baseController.php');
require_once('models/work.php');
class calendarController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'calendars';
    }

    public function index()
    {
        $schedules = [];
        $workModal = new work();
        $datas = $workModal->all();
        foreach ($datas as $key => $value) {
            array_push($schedules, (object) [
                'id' => $value['id'],
                'calendarId' => $value['id'],
                'title' => $value['work_name'],
                'start' => $value['start_date'],
                'end' => $value['end_date'],
                'state' => $this->renderState($value['status']),
            ]);
        }
        $this->render('calendar', $schedules);
    }

    public function addCalendar()
    {

    }

    public function renderState($status) {
        switch ($status) {
            case '1':
                $status = 'Planning';
                break;
            case '2':
                $status = 'Doing';
                break;
            case '3':
                $status = 'Complete';
                break;
            default:
                $status = 'Planning';
                break;
        }
        return $status;
    }
}

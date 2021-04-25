<?php
require_once 'controllers/baseController.php';
require_once 'models/work.php';

class CalendarController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'calendars';
    }

    public function index()
    {
        $schedules = [];
        $workModal = new Work();
        $datas = $workModal->all();
        foreach ($datas as $key => $value) {
            array_push($schedules, (object) [
                'id' => $value['id'],
                'calendarId' => $value['id'],
                'title' => $value['work_name'],
                'location' => $value['location'],
                'start' => $value['start_date'],
                'end' => $value['end_date'],
                'state' => $this->renderState($value['status']),
            ]);
        }
        $this->render('calendar', $schedules);
    }

    public function addCalendar()
    {
        $datas = [[
            'work_name' => $_POST['work_name'],
            'location' => $_POST['location'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ]];
        $workModal = new Work();
        return $workModal->insert($datas);
    }

    public function editCalendar()
    {
        $data = [
            'id' =>  $_POST['id'],
            'work_name' => $_POST['work_name'],
            'location' => $_POST['location'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];
        $workModal = new Work();
        return $workModal->update($data);
    }

    public function renderState($status)
    {
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

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
                'state' => $value['status'],
            ]);
        }
        $this->render('calendar', $schedules);
    }

    public function getCalendar()
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
                'state' => $value['status'],
            ]);
        }
        echo json_encode(array('datas' => $schedules));
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
        $result = $workModal->insertCalendar($datas);
        echo json_encode(array('status' => $result));
    }

    public function editCalendar()
    {
        $data = [
            'id' => $_POST['id'],
            'work_name' => $_POST['work_name'],
            'location' => $_POST['location'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];
        $workModal = new Work();
        $result = $workModal->updateCalendar($data);
        echo json_encode(array('status' => $result));
    }

    public function deleteCalendar()
    {
        $id[] = $_POST['id'];
        $workModal = new Work();
        $result = $workModal->deleteCalendar($id);
        echo json_encode(array('status' => $result));
    }

}

<?php
$controllers = array(
    'calendar' => ['index', 'addCalendar', 'editCalendar', 'deleteCalendar', 'getCalendar'],
    'pages' => ['error'],
);
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

foreach ($controllers as $key => $value) {
    include_once 'controllers/' . $key . 'Controller.php';
}
$klass = ucwords($controller) . 'Controller';
$controller = new $klass;
$controller->$action();

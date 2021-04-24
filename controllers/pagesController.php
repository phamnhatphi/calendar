<?php
require_once('controllers/baseController.php');

class pagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function error()
  {
    $this->render('error');
  }
}

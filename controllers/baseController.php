<?php
class BaseController
{
    protected $folder;

    public function render($file, $datas = array())
    {
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($datas);
            ob_start();
            require_once $view_file;
            $content = ob_get_clean();
            require_once 'views/layouts/app.php';
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
}

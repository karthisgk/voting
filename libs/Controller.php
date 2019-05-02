<?php
class Controller{
    function __construct() {
        $this->view=new View();

       // $this->view->render('header', NULL,'includes');
    }
    function __destruct()
    {
        $this->view->render('footer', NULL,'includes');
    }

    public function loadModel($name)
    {
        $path='models/'.$name.'_model.php'; //model path
        if(file_exists($path))
        {
            require $path;
            $modelName=$name.'_Model';
            $this->model=new $modelName;
        }
        //comman
        $this->view->menu=$this->model->menu();
        $this->view->menu_more=$this->model->menu_more();
//        $this->view->wallpaper=$this->model->wallpaper();
        
    }
    public function loadAdminModel($name)
    {
        $path='admin/models/'.$name.'_model.php';
        if(file_exists($path))
        {
            require $path;
            $modelName=$name.'_Model';
            $this->model=new $modelName;
        }
    }
}


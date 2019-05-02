<?php
class nominate extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


    $this->view->render('nominate');
}

public function nominate()
{
    $data=array(
        'n_regno'=>$_POST['reg_no'],
        'n_name'=>$_POST['name'],
        'n_dept_no'=>$_POST['dept_no'],
        'n_dept_name'=>$_POST['dept_name'],
        'black_mark'=>$_POST['mark'],
        'posting'=>$_POST['posting'],
        'dp'=>$_FILES['dp']['name']
    );
//    print_r($data);
//    exit;
    $this->res=$this->model->nominate($data);
}
}
<?php
class List_patient extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {

        if (isset($_SESSION['admin'])) {
            $this->view->join_list = $this->model->getrecord();

            $this->view->render1('list_patient');
        } else {
            $this->view->render1('login');
        }
    }


    public function delete()
    {
        $data=array('p_id'=>$_POST['p_id']);
//         var_dump($data);
        $this->view->delete_result=$this->model->delete_single_video($data);
    }
}
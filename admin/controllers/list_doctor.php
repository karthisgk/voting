<?php
class List_doctor extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index($data=null)
    {
      
            if (isset($_SESSION['admin']))
        {
            $this->view->record_list=$this->model->getrecord($data);
//            print_r($this->view->record_list);
//            exit;
            $this->view->render1('list_doctor');
        }
        else
        {
            $this->view->render1('login');
        }
        
    }
    public function deletesingle_doctor()
    {
        $data=array('doctor_id'=>$_POST['doctor_id']);
//        print_r($data);
//        exit;
        $this->view->delete_result=$this->model->delete_single_doctor($data);
    }
   


}
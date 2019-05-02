<?php
class Add_doctor extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {

            if (isset($_SESSION['admin'])) {
                $this->view->render1('add_doctor');
            } else {
                $this->view->render1('login');
            }
        }
    
    public function add_doctor()
    {
        $data =array(
        'doctor_id'=>'',
        'doctor_name'=>$_POST['doctor_name'],
        'roll'=>$_POST['roll'],
            'login_id'=>$_POST['login_id'],
        'password'=>$_POST['password']

//        'menu_order'=>'no',
//            'c_icon'=>$_POST['cat_icon']
        );  //input value of the view page (index view page)
//        var_dump($data);
//        print_r($data);
//        exit;
        $this->model->add_doctor($data);   //it will load home_insert modal
    }
}
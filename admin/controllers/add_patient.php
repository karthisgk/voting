<?php
class Add_patient extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {

        if(isset($_SESSION['admin']))
        {

            $this->view->render1('add_patient');
        }
        else
        {
            $this->view->render1('login');
        }

    }
    public function addpatient_form()
    {
        $data=array(
            'p_id'=>'',
            'p_name'=>$_POST['name'],
            'p_age'=>$_POST['age'],
            'p_gender' => $_POST['gender'],
            'p_des'=>$_POST['des'],
            'p_disease'=>$_POST['disease'],
            'p_history'=>$_POST['history'],
            'p_condition'=>$_POST['condition']
        );

//  print_r($data);
//      exit;
        $this->model->addpatient_form($data);





    }





    }
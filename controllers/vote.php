<?php
class Vote extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        print_r($_SESSION);
//        exit;
        if(isset($_SESSION)) {
            $data=array(
               'reg_no'=>$_SESSION['reg_no']
            );
            $this->model->sign_in($data);


            $this->view->nominate_precedentlist=$this->model->nominate_precedentlist();
            $this->view->nominate_vice_precedentlist=$this->model->nominate_vice_precedentlist();
            $this->view->nominate_Accedamylist=$this->model->nominate_Accedamytlist();
            $this->view->sports=$this->model->sports();
            $this->view->render('vote');
        }
        else {

            $this->view->render('home');
        }
    }

    public function ps()
{
   $data=array(
       'n_id'=>$_POST['n_id'],
       's_regno'=>$_SESSION['reg_no']
   );

  $this->model->ps($data);
  $n_id=$_POST['n_id'];
  $this->model->count($n_id);


}
    public function vps()
    {
        $data=array(
            'n_id'=>$_POST['n_id'],
            's_regno'=>$_SESSION['reg_no']
        );

        $ps=$this->model->vps($data);
        $n_id=$_POST['n_id'];
        $this->model->count($n_id);
        if($ps)
        {
            echo" Vice Precedent Voted Success fully";
        }


    }

    public function accadummy()
    {
        $data=array(
            'n_id'=>$_POST['n_id'],
            's_regno'=>$_SESSION['reg_no']
        );
       $this->model->vps($data);
        $n_id=$_POST['n_id'];
        $this->model->count($n_id);



    }

    public function sport()
    {
        $data=array(
            'n_id'=>$_POST['n_id'],
            's_regno'=>$_SESSION['reg_no']
        );

       $this->model->sport($data);
        $n_id=$_POST['n_id'];
        $this->model->count($n_id);


    }
public function accadumy()
{
    $data=array(
        'n_id'=>$_POST['n_id'],
        's_regno'=>$_SESSION['reg_no']
    );

$this->model->accadumy($data);
    $n_id=$_POST['n_id'];
    $this->model->count($n_id);
}
public function logout()
{

}
}
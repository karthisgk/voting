<?php
class Login extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render1('login');
    }
    public function login_check()
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $match=$this->model->login($email);
        if (count($match)==1)
        {
            $pass=$match[0]['password'];
            if ($password==$pass)
            {
                $_SESSION['admin']='started';

                echo '<script>window.location.replace("../home")</script>';
            }
            else
            {
                echo '<script>window.location.replace("../login?fail")</script>';
            }
        }
        else
        {
            echo '<script>window.location.replace("../login?fail")</script>';
        }

    }
}
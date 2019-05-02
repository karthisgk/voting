<?php
class Logins extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $this->view->render('Logins');

    }

    public function login()
    {
        $reg_no = $_POST['user'];
        $password = $_POST['password'];
        $match = $this->model->login($reg_no);
//        print_r($match);
//        exit;

        if ($match) {
            $pass = $match[0][0];

//            print_r($rol);
//            exit;
            if ($password == $pass) {
                $_SESSION['reg_no'] = $reg_no;
                echo '<script>window.location.replace("../lis")</script>';
            } else {
//                echo"Enter your correct username Password";
//                echo '<script>window.location.replace("/votting/home")</script>';
                echo "Check your Password";
            }

        } else {
            echo "Please Check your Username Password";
        }
    }









}
<?php
class Otp extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 public function index()
 {
     $this->view->render('otp');
 }
 public function otp()
 {
$otp=$_POST['otp'];
//print_r($otp);
//exit;
  $sss=$this->model->otp($otp);
//  print_r($sss);
//exit();
     if ($sss) {
         $otpp = $sss[0][otp];

//            print_r($otpp);
//            exit;
         if ($otp == $otpp) {
             echo '<script>window.location.replace("../vote")</script>';
         } else {
//                echo"Enter your correct username Password";
//                echo '<script>window.location.replace("/votting/home")</script>';
             echo "otp is wrong";
         }
     }
 }
}
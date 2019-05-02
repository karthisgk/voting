<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $date_time= $this->model->get_date();
        $_SESSION['time']=$date_time[0]['time'];
        $this->view->render('home');

    }
    public function reg()
    {
        $data=array(
           'reg_no'=>$_POST['reg_no'],
            'name'=>$_POST['name'],
            'dept_no'=>$_POST['dept_no'],
            'dept_name'=>$_POST['dept_name'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'phone'=>$_POST['phone']
        );
//        print_r($data);
//        exit;
      $this->res= $this->model->reg($data);
//      print_r($test);


    }

    public function login()
    {
        $reg_no = $_POST['reg_no'];
//        print_r($reg_no);
//        exit;
        $password = $_POST['password'];
//        print_r( $password);
//        exit;
        $date_time= $this->model->get_date();
//        print_r($date_time[0]['time']);


        date_default_timezone_set('asia/kolkata');

        $edate = $date_time[0]['time'];
        $datestr = $edate;//Your date
        $date=strtotime($datestr);//Converted to a PHP date (a second count)
        $diff=$date-time();//time returns current time in seconds
        $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
        $hours=round(($diff-$days*60*60*24)/(60*60));
        $hours2=floor(($diff-$days*60*60*24)/(60*60));

//        echo $days.' '.$hours2;
//        exit;

        if($days<0) {
            $match = $this->model->login($reg_no);
//            print_r($match);
//            exit;

            if ($match) {
                $pass = $match[0][0];
                $phone=$match[0][1];

//            print_r($rol);
//            exit;
                if ($password == $pass) {
                    $_SESSION['reg_no'] = $reg_no;
                    $_SESSION['phone']=$phone;
                    $otp=rand(1000,9999);
//                    print_r($otp);
//                    exit;
                     $this->model->update_otp($phone,$otp);
                     $this->sms($phone,$otp);
//                    print_r($_SESSION['phone']);
//                    exit;

                    echo '<script>window.location.replace("../votting/otp")</script>';
                } else {
//                echo"Enter your correct username Password";
//                echo '<script>window.location.replace("/votting/home")</script>';
                    echo "Check your Password";

                }

            } else {
                echo "Please Check your Register Number Password";
            }   
        }
        else
            {
//                echo "$days days - $hours hours left";
                echo "Election Not Started";
                exit;

            }
        }
    public function logout()
    {
        session_destroy();
        echo '<script>alert("logout successfully");window.location.replace("'.BASE_PATH.'home")</script>';
        exit();
    }
    public function sms($phone,$otp)

        {

            $Phone=$_SESSION['phone'];
            $fff= $this->model->getmail($phone);
//      print_r($fff);
//      exit;
            $phone=$fff['0']['phone'];
//        print_r($phone);
//        exit();
            $otp=$fff['0']['otp'];
//      print_r($otp);
//      exit();


            if ($fff) {
                $username = "indnaren";

                $password = "technologies123";

                $message = "Your OTP number is $otp";

                $sender = "fabsys";

                $mobile_number = $phone;

                $url = "user=" . urlencode($username) . "&password=" . urlencode($password) . "
&mobile=" . urlencode($mobile_number) . "&message=" . urlencode($message) . "&sender=" . urlencode($sender) . "&type=" . urlencode('3');
//print_r($url);
                $ch = curl_init('login.bulksmsgateway.in/sendmessage.php?');


                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);


                curl_close($ch);
                echo '<script>alert("OTP sent SUCCESSFULLY");window.location.replace("'.BASE_PATH.'otp")</script>';


            }


    }

}

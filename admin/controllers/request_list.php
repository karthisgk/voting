<?php
class Request_list extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_SESSION['admin'])) {
            $this->view->request_list = $this->model->request_list();
//                print_r(    $this->view->request_list);
//                exit;
//                print_r(  $this->view->command_list);
//                exit;
            $this->view->render1('request_list');
        } else {
            $this->view->render1('login');
        }

    }


    public function accept($min = null, $max = null)
    {
        $data = array(
            'r_id' => $_POST['r_id'],

        );

        $request = $this->model->accept($data);

        if ($min === null) {
            $min = 0;
        }
        if ($max === null) {
            $max = PHP_INT_MAX;
        }
        static $seed = 3;
        $epoch = microtime(true) - 1262304000;
        $start = microtime(true);
        for ($i = 0; $i < $epoch; $i += 10000) {
        };
        $diff = microtime(true) - $start;

        $x = $epoch - $min + ($seed + ($epoch & 1 ? -1 : 1) * $diff);
        // 3sin(20x^(6/7)) * 3sin(4x^(3/2))
        $value = ((9 * sin(20 * pow($x, 6 / 7)) * sin(pow($x * 4, 3 / 2))) + 9) / 18;
        ++$seed;
        $test = round($value * ($max - $min) + $min);
//               print_r($test);
//
//               exit;
        $mail_message = "Your OTP is $test";
        $mail_subject = 'Pesudocode OTP';
        $sub = "Hello Send your confimation OTP for Patient Details!";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
        $headers .= 'From: cyril@fabsys.in';
        $to = $request[0][2];
        $message = "<table xmlns=\"http://www.w3.org/1999/html\">
					<thead><tr><td colspan='2'><center><b>Patient Detail OTP!</b></center></td></tr></thead>
					<tbody>
					<tr>
					<td><b>Subject :</b> $mail_subject</td>
					</tr>
					<tr>
					<td><b>User name:</b>$to</td>
                    </tr>
                    <tr>
                    </tr>
				
					<tr>
					<td><b>Message:</b>$mail_message
                    </td>
                    </tr>
					</tbody>
					</table>";
         mail($to, $sub, $message, $headers);
        $acc = array(
            'r_id' => $_POST['r_id'],

        );

       $this->model->accup($acc);
        $otp=array(
            'r_id' => $_POST['r_id'],
            'otp'=>$test);
           $this->model->otp($otp);
//           print_r( $this->model->otp);
//           exit;

}
public function rejected()
{
    $data = array(
        'r_id' => $_POST['r_id'],

    );
   $request=$this->model->reject($data);
//   print_r( $request);
//   exit;
    $mail_message = "Your Disease Report Requested is REJECTED";
    $mail_subject = 'Disease details';
    $sub = "Disease Details";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $headers .= 'From: cyril@fabsys.in';
    $to = $request[0][0];
    $message = "<table xmlns=\"http://www.w3.org/1999/html\">
					<thead><tr><td colspan='2'><center><b>Rejected Your Disease Detail Request</b></center></td></tr></thead>
					<tbody>
					<tr>
					<td><b>Subject :</b> $mail_subject</td>
					</tr>
					<tr>
					<td><b>User name:</b>$to</td>
                    </tr>
                    <tr>
                    </tr>
				
					<tr>
					<td><b>Message:</b>$mail_message
                    </td>
                    </tr>
					</tbody>
					</table>";
    mail($to, $sub, $message, $headers);
    $reject=array(
        'r_id' => $_POST['r_id']
    );
    $this->model->rejectup($reject);

    $nullvalue=array(
        'r_id' => $_POST['r_id']
    );
    $this->model->nullvalue($nullvalue);
}


}

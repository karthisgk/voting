<?php
class Home_Model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }

    public function add($conn, $tablename, $inp) {
        if(!is_array($inp))
            return 0;
        $cols = '(';
        $vals = '(';
        $k = 1;
        foreach ($inp as $col => $val) {
            $cols .= "`$col`";
            $vals .= "'$val'";
            if(count($inp) != $k){
                $cols .= ', ';
                $vals .= ', ';
            }
            $k++;
        }
        $cols .= ')';
        $vals .= ')';
        $qry = "INSERT INTO $tablename $cols VALUES $vals";
        $result = $conn->query($qry);
        if ($result) {
            return $conn->insert_id;
        }else
            return 0;
    }

    public function reg($data)
    {
//        print_r($data);
//        exit;
        $conn = new mysqli('localhost', 'root', 'y5kj3XdKjOII', 'votting');
        $sql = "select count(reg_no) from student where reg_no=$data[reg_no]";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $ans = $stmt->FetchAll();
//       print_r($ans);
//       exit;
        if ($ans[0][0] == 0) {
            $result = $this->add($conn, 'student', $data);;
            if ($result != 0) {
                echo "Register Success fully";
            } else {
                echo "Register Failed";
            }
        } else {
            echo "Already Register";
        }

    }


    public function login($reg_no)
    {
        $sql = "select * from student where reg_no=$reg_no[reg_no]";
        $stmt = $this->db->prepare($sql);
//    print_r($stmt);
//    exit();
        $stmt->execute();
        $ans = $stmt->FetchAll();
//    print_r($ans);
//    exit;
        if ($ans[0][0] == 0) {
            {
                $field = array('password', 'phone');
                $table = 'student';
                $where = array('reg_no' => $reg_no);
                $this->res = $this->db->select($field, $table, $where);
                return $this->res;

            }
        } else {
            echo "You have already voted";
            exit;
        }
    }

    public function get_date()
    {
        $sql = "select time from admin";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }

    public function update_otp($phone, $otp)
    {
        $sql = "update student set otp='" . $otp . "' where phone='" . $phone . "'";
        $this->db->query($sql);
    }

    public function getmail($phone)
    {
        $ver = "select phone,otp from student where phone='" . $phone . "'";
//        print_r($ver);
//        exit;
        $stmt = $this->db->prepare($ver);
//    print_r($stmt);
//    exit();
        $stmt->execute();
       return  $stmt->FetchAll();

    }
}
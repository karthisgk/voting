<?php
class otp_model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }
    public function otp($otp)
    {
//        print_r($otp);
//        exit;
        $sql="select * from student where otp=$otp";
//        print_r($sql);
//        exit();
        $stmt = $this->db->prepare($sql);
//    print_r($stmt);
//    exit();
         $stmt->execute();
         return $stmt->FetchAll();

    }
}
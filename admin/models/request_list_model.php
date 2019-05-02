<?php
class Request_list_Model extends Model{
    private $res=null;
    function __construct() {
        parent::__construct();
    }
    public function request_list()

 {
//     $fields=array('*');
//     $this->res=$this->db->select($fields,'request');
//     return $this->res;



       $sql="select r.r_id,r.p_id,r.state,r.d_mail,p.p_id,p.p_name,p.p_disease from 
        request r left join patient p on r.p_id=p.p_id";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
 }
 public function accept($data)
 {

     $sql = "select * from request where r_id=$data[r_id]";
     $stmt = $this->db->prepare($sql);
     $stmt->execute();
     $count = $stmt->fetchAll();
     return $count;
 }
  public function accup($acc)
  {
      $sql = "UPDATE request SET state='Accepted' WHERE r_id=$acc[r_id]";
      $stmt=$this->db->prepare($sql);
     $stmt->execute();
     return $stmt->fetchAll();


 }

 public function otp($otp)
 {
     $sql = "UPDATE request SET otp=$otp[otp] WHERE r_id=$otp[r_id]";
     $stmt = $this->db->prepare($sql);
     $stmt->execute();
     $count = $stmt->fetchAll();
     if ($count) {

     } else {
         echo "Accepted Success Full";
     }


 }
public function reject($data)
{

    $sql = "select d_mail from request where r_id=$data[r_id]";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchAll();
    return $count;

}
public function rejectup($reject)
{

    $sql = "UPDATE request SET state='Rejected' WHERE r_id=$reject[r_id]";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchAll();
    return $count;
}
   public function nullvalue($nullvalue)
    {

          $sql = "UPDATE request SET otp='Null' WHERE r_id=$nullvalue[r_id]";


    $stmt=$this->db->prepare($sql);
    $stmt->execute();
    $delete = $stmt->fetchAll();
 if($delete)
    {
        echo"Access Denied";
    }
}


}
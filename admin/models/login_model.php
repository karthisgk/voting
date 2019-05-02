<?php
class Login_Model extends Model
{
    private $res=null;
    function __construct()
    {
        parent::__construct();
    }
    public function login($email)
    {
        $field=array('password');
        $table=' login ';
        $where=array('email'=>$email,'status'=>"active");
        $this->res=$this->db->select($field,$table,$where,$ord=null,$limit=null);
        return $this->res;
    }
}
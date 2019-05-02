<?php
class Logins_Model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }




    public function login($reg_no)
    {

                $field = array('password');
                $table = 'admin';
                $where = array('username' => $reg_no);
                $this->res = $this->db->select($field, $table, $where);
                return $this->res;



    }
}
<?php
class List_doctor_model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }

    public function getrecord($data)
    {
        $field = array('*');
        $this->res = $this->db->select($field, 'doctor');
        return $this->res;
    }
    public function delete_single_doctor($data)
    {
        $where=array('doctor_id'=>$data['doctor_id']);
        $this->res=$this->db->delete('doctor',$where);
        if($this->res)
        {
            echo 'Deleted Sucessfully';
        }
        else
        {
            echo 'Sorry Error in Delete';
        }
    }

}
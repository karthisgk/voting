<?php
class List_patient_Model extends Model
{
    private $res=null;
    function __construct() {
        parent::__construct();
    }
    public function getrecord()
    {
        $fields=array('*');
        $this->res=$this->db->select($fields,'patient');
        return $this->res;
    }

    public function delete_single_video($data)
    {

        $where=array('p_id'=>$data['p_id']);
        $this->res=$this->db->delete('patient',$where);
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
<?php
class Add_doctor_Model extends Model
{
    private $res=null;
    function __construct() {
        parent::__construct();
    }
    public function add_doctor($data)
    {
       
        $fields=array('doctor_name');
        $where=array('doctor_name'=>$data['doctor_name']);
        $this->res=$this->db->select($fields,'Doctor',$where); //select function to database class
        if($this->res)
        {
            echo 'Alredy Exits The Doctor Name';
        }
        else
        {
            $this->res=$this->db->insert('doctor',$data);   //send info to insert fun in database file and receive the result from insert fun
            if($this->res)
            {
                echo 'Added Successfully';
            }
            else
            {
                echo 'Sorry Please Try Again Some Time';
            }
        }
    }
    
}

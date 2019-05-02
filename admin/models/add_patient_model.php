<?php
class Add_patient_model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }


    public function addpatient_form($data)
    {

                        $result = $this->res = $this->db->insert('patient', $data);
//               print_r($result);
//                exit;
                        if ($result) {
                            echo 'Add Successfully';
                        } else {
                            echo 'Not Successfull';
                        }


    }



}




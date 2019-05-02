<?php
class Nominate_Model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }
    public function nominate($data)
    {
        $sql = "select count(n_regno) from nominate where n_regno=$data[n_regno]";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $regno = $stmt->FetchAll();
//        print_r($regno);
//        exit;
        if($regno[0][0]==0)
        {

        if($data['black_mark']=="yes")
        {
            echo"You are not qualified nominate the election";
        }
        else {
            $sql = "select count(reg_no) from student where reg_no=$data[n_regno]";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $ans = $stmt->FetchAll();
            if ($ans[0][0] == 1) {
                $folder = "dp";
                $video_name = "dp";
                $this->res = $this->db->upload_video($folder, $video_name);
                if ($this->res == "Upload video successfully") {
                    $result = $this->res = $this->db->insert('nominate', $data);
                    if ($result) {
                        echo "Nomination Successfully";

                    } else {
                        echo "Nominamtion Failed Some problem";
                    }
                } else {
                    echo "already Exit the Profile";
                }
            } else {
                echo "Invalid Student Register Number";
            }
        }
        }
        else{
            echo"Alredy Nominated";
        }
    }


}
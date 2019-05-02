<?php
class Vote_Model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();
    }

    public function nominate_precedentlist()
    {
        $sql = "select * from nominate where posting='precedent'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }

    public function nominate_vice_precedentlist()
    {
        $sql = "select * from nominate where posting='vice precedent'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }

    public function nominate_Accedamytlist()
    {
        $sql = "select * from nominate where posting='Accedamy'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }

    public function sports()
    {
        $sql = "select * from nominate where posting='sports'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }

    public function sign_in($data)
{
   $this->res = $this->db->insert('voted', $data);
}
public function ps($data)
{

    $sql = "select count(s_regno) from ps_vote where s_regno=$data[s_regno]";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

   $count=$stmt->FetchAll();

   if($count[0][0]==0)
   {
       $this->res = $this->db->insert('ps_vote', $data);
       echo "precedent voted Success fully";
   }
   else {
    echo "Already voted for the  precedent";
}


}
    public function vps($data)
    {
        $sql = "select count(s_regno) from vp where s_regno=$data[s_regno]";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $count=$stmt->FetchAll();

        if($count[0][0]==0)
        {
            $this->res = $this->db->insert('vp', $data);
            echo "vice voted Success fully";
        }
        else {
            echo "Already voted for the vice precedent";
        }
    }

    public function sport($data)
{
//    print_r($data);
//    exit;
    $sql = "select count(s_regno) from sports_vote where s_regno=$data[s_regno]";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $count=$stmt->FetchAll();

    if($count[0][0]==0)
    {
        $this->res = $this->db->insert('sports_vote', $data);
        echo "Sports voted Success fully";
    }
    else {
        echo "Already voted for the Sports";
    }
}


    public function accadumy($data)
    {
//    print_r($data);
//    exit;
        $sql = "select count(s_regno) from acc_vote where s_regno=$data[s_regno]";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $count = $stmt->FetchAll();

        if ($count[0][0] == 0) {
            $this->res = $this->db->insert('acc_vote', $data);
            echo "accadumy voted Success fully";
        } else {
            echo "Already voted for the accadumy";
        }
    }


    public function count($n_id)
    {

        $sql ="select count(*) from total where n_id=$n_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $count=$stmt->FetchAll();
//print_r( $count[0]);
//        exit;
        if($count[0][0]==0)

        {
//           echo"success";
            $sql="insert into total(n_id,total)VALUES ($n_id,'1')";
//
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->FetchAll();
        }
        else
        {
//          echo"failed";
            $sql="update total set total =1+total where n_id=$n_id;";
//            print_r( $sql);
//            exit;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->FetchAll();
    }



}
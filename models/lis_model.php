<?php
class Lis_Model extends Model
{
    private $res = null;

    function __construct()
    {
        parent::__construct();

    }
    public function ps_list()
    {
        $sql="select n.n_id,n.n_name,n.n_regno,t.total from nominate n left join total t on n.n_id=t.n_id where posting='precedent'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function vp_list()
    {
        $sql="select n.n_id,n.n_name,n.n_regno,t.total from nominate n left join total t on n.n_id=t.n_id where posting='vice precedent'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function sp()
    {
        $sql="select n.n_id,n.n_name,n.n_regno,t.total from nominate n left join total t on n.n_id=t.n_id where posting='sports'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function acc()
    {
        $sql="select n.n_id,n.n_name,n.n_regno,t.total from nominate n left join total t on n.n_id=t.n_id where posting='Accedamy'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}






<?php
class Home_Model extends Model
{
    private $res=null;
    function __construct() {
        parent::__construct();
    }
    public function total_video()
    {
        $this->res=$this->db->count('video');
        return $this->res;
    }
    public function vote_like()
    {
        $where=array('vote_type'=>'1');
        $this->res=$this->db->count('vote',$where);
        return $this->res;
    }
    public function vote_dislike()
    {
        $where=array('vote_type'=>'0');
        $this->res=$this->db->count('vote',$where);
        return $this->res;
    }
    public function last_5_category()
    {
        $fields=array('cat_name','cat_date');
        $ord=' cat_date DESC';
        $limit='5';
        $this->res=$this->db->select($fields,'category',$where=null,$ord,$limit);
        return $this->res;
    }
    public function last_5_video()
    {
        $fields=array('v_name','created_at');
        $ord=' created_at DESC';
        $limit='5';
        $this->res=$this->db->select($fields,'video',$where=null,$ord,$limit);
        return $this->res;
    }
    public function last_5_command()
    {
        $fields=array('cmd_name','cmd_msg','cmd_date');
        $ord=' cmd_date DESC';
        $limit='5';
        $this->res=$this->db->select($fields,'command',$where=null,$ord,$limit);
        return $this->res;
    }
}
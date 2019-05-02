<?php
class Model{
    private $res=null;
            function __construct() {
        
          $this->db=new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);  //syntax od PDO method
          $this->view=new View();   
    }
    //comman
    public function menu()
    {
        $fields=array('cat_name');
        $ord='menu_order';
        $limit='7';
        $this->res=$this->db->select($fields,'category',$where=null,$ord,$limit);
        return $this->res;
    }
    public function menu_more()
    {
        $fields=array('cat_name');
        $where=array('menu_order'=>'no');
        $ord='menu_order';
        $this->res=$this->db->select($fields,'category',$where,$ord=null,$limit=null);
        return $this->res;
    }
//    
//    public function wallpaper()
//    {
//        $fields=array('bg_image');
//        $where=array('bg_set'=>'Yes');
//        $this->res=$this->db->select($fields,'background',$where,$ord=null,$limit=null);
//        return $this->res;
//    }
    public function get_all_catgory()
    {
        $fields=array('cat_name','cat_id');
        $order='cat_id';
        $this->res=$this->db->select($fields,'category',$where=null,$order);
        return $this->res;
    }
    public function get_all_game()
    {
        $fields=array('v_name','cat_id');
        $order='cat_id';
        $this->res=$this->db->select($fields,'video',$where=null,$order);
        return $this->res;
    }
}

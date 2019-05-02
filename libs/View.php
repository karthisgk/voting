<?php
class View
{
    function __construct() {
        
    }
    public function render($name,$response=false, $sub_folder = NULL)
    {
        if($sub_folder != NULL){
//            require  'view/' .$sub_folder. '/' .$name.'_view.php';
        }else{
            require 'view/'.$name.'_view.php';
        }
    }
    public function render1($name,$response=false) {
        require 'admin/view/' . $name . '_view.php';
    }
}

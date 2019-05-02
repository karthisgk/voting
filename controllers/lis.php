<?php
class Lis extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $this->view->ps_list=$this->model->ps_list();
        $this->view->vp_list=$this->model->vp_list();
        $this->view->sp_list=$this->model->sp();
        $this->view->acc_list=$this->model->acc();



        $this->view->render('lis');

    }
}
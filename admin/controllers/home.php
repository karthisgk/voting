<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_GET['logout'])) {
            unset($_SESSION['admin']);

            echo '<script>window.location.replace("login")</script>';
        }
        else
        {
            if (isset($_SESSION['admin']))
            {
                $this->view->total_video = $this->model->total_video();
                $this->view->like = $this->model->vote_like();
                $this->view->dislike = $this->model->vote_dislike();
                $this->view->last_5_cat = $this->model->last_5_category();
                $this->view->last_5_video = $this->model->last_5_video();
                $this->view->last_5_command = $this->model->last_5_command();

                $this->view->render1('home');
            }
            else
            {
                $this->view->render1('login');
            }
        }
    }
}
<?php

namespace Controller;

use \Core\Controller as Controller;
use \Model\Blog as Blog;
use \Core\Database as Database;


class Home extends Controller
{
    private $model;

    /**
     * Init a model
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Blog(Database::getInstance());
    }

    public function index()
    {
        $posts = $this->model->getPostsLimited(1);
        $this->render('index.twig', array('posts' => $posts));
    }

    public function save()
    {
        if (isset($_POST['id'])
            && isset($_POST['value'])
            && ($id = preg_replace('/[^\d+]/is', '', $_POST['id']))
            && $id
        ) {
            $this->model->updatePostTitleById($id, $_POST['value']);
            echo htmlentities($_POST['value'])  ;
        }
    }
}
<?php

namespace Controller;

use \Core\Controller as Controller;
use \Core\Config as Config;
use \Model\Blog as Blog;
use \Core\Database as Database;


class Home extends Controller
{
    private $model;

    /**
     * Init a model and view
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Blog(Database::getInstance());
    }

    public function index()
    {
        $posts = $this->model->getPostsLimited(2);
        $page_id = $page_next = 0;
        if (isset($posts[0])) {
            $page_id = $posts[0]->id_post;
        }
        if (isset($posts[1])) {
            $page_next = $posts[1]->id_post;
        }
        $this->render('index.twig', array(
            'page_id' => $page_id,
            'page_next' => $page_next,
            'posts' => isset($posts[0]) ? array($posts[0]) : array(),
        ));
    }

    public function update()
    {
        // @todo rewrite to json
        if (isset($_POST['id'])
            && isset($_POST['value'])
            && ($id = preg_replace('/[^\d+]/is', '', $_POST['id']))
            && $id
        ) {
            $field = preg_replace(
                array('/blog\-/is', '/\-\d+/', '/\-/is'),
                array('', '', '_'),
                $_POST['id']
            );
            $this->model->updatePostById(array(
                'id_post' => $id,
                $field => $_POST['value']
            ));
            echo htmlentities($_POST['value']);
        } else {
            // @todo send 404 or another error
            $config = Config::getInstance();
            header('Location: ' . $config['baseurl']);
            exit(1);
        }
    }

    public function add()
    {
        if (isset($_POST['blog-post-title'])
            && isset($_POST['blog-post-created'])
            && isset($_POST['blog-post-content'])
        ) {
            $this->model->insertNewPost(array(
                'post_title' => $_POST['blog-post-title'],
                'post_created' => $_POST['blog-post-created'],
                'post_content' => $_POST['blog-post-content'],
            ));
            // @todo move to helpers
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
            echo json_encode(array('ok'));
        } else {
            // @todo validate form in js
            $config = Config::getInstance();
            header('Location: ' . $config['baseurl']);
            exit(1);
        }
    }

    public function next()
    {
        $id_next = isset($_GET['n'])
            ? preg_replace('/[^\d+]/is', '', $_GET['n'])
            : false;
        $id = isset($_GET['p'])
            ? preg_replace('/[^\d+]/is', '', $_GET['p'])
            : false;
        if ($id_next) {
            $posts = $this->model->getNextPosts($id_next, $id);
            // @todo move to helpers
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
            if (isset($posts[1])) {
                $posts[0]->next = $posts[1]->id_post;
                echo json_encode(($posts[0]));
            } elseif (isset($posts[0])) {
                $posts[0]->next = false;
                echo json_encode($posts[0]);
            } else {
                echo json_encode(array());
            }
        } else {
            // @todo send 404 or another error
            $config = Config::getInstance();
            header('Location: ' . $config['baseurl']);
            exit(1);
        }
    }
}
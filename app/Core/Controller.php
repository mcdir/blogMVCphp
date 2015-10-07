<?php

namespace Core;

abstract class Controller
{

    private $view;

    public function __construct()
    {
        $this->view();
    }

    private function view()
    {
        $this->view = new View();
    }

    /**
     * @inheritdoc Twig render
     */
    public function render($path, $data = false, $error = false)
    {
        echo $this->view->tpl->render($path, $data, $error);
    }

    abstract public function index();
}

<?php

namespace Core;

class View
{
    /**
     * The actual template
     *
     * @var Twig_Environment
     */
    public $tpl;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../template/');
        $this->tpl = new \Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../../cache/',
            'auto_reload' => true
        ));
        $config = Config::getInstance();
        $this->tpl->addGlobal("baseurl", $config['baseurl']);
    }

    /**
     * Return the parsed view
     *
     * @return string
     */
    public function __toString()
    {
        // @todo to json
    }
} 

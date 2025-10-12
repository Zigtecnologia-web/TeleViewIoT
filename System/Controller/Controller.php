<?php
namespace System\Controller;

use System\View\View;
use System\Get\Get;
use System\Post\Post;

class Controller
{
    private $objectView;
    protected $post;
    protected $get;

    public function __construct()
    {
        $this->objectView = new View();
        $this->post = new Post();
        $this->get = new Get();
    }

    /**
	 * This method is used to set the layout name
	 * @return Void
	*/
    public function view(String $viewName, $withLayout = false, $data = false)
    {
       $this->objectView->view($viewName, $withLayout, $data);
    }

    public function getQueryString()
    {
        if (!empty($_GET)) {
            return (object) $_GET;
        }

        return [];
    }

    public function getPostData()
    {
        if (!empty($_POST)) {
            return (object) $_POST;
        }

        return [];
    }
}

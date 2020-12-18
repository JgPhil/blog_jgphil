<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;
use App\src\DAO\UserDAO;
use App\src\DAO\PictureDAO;
use App\src\DAO\CommentDAO;
use App\Framework\Controller;
use App\Framework\Validation;
use App\Framework\Upload;
use App\Framework\Method;

/**
 * Class BlogController
 */
abstract class BlogController extends Controller
{
    protected $postDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $pictureDAO;
    protected $validation;


    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->postDAO = new PostDAO;
        $this->commentDAO = new CommentDAO;
        $this->userDAO = new UserDAO;
        $this->validation = new Validation;
        $this->pictureDAO = new PictureDAO;
    }

}

<?php

namespace App\Framework;

class Request
{
    protected $getMethod;
    protected $postMethod;
    protected $session;
    protected $files;
    protected $_SESSION;
    protected $_POST;
    protected $_GET;
    protected $_FILES;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->_POST = (isset($_POST)) ? $_POST : null;
        $this->_GET = (isset($_GET)) ? $_GET : null;
        $this->_SESSION = (isset($_SESSION)) ? $_SESSION : null;
        $this->_FILES = (isset($_FILES)) ? $_FILES : null;
        $this->getMethod = new Method($this->_GET);
        $this->postMethod = new Method($this->_POST);
        $this->session = new Session($this->_SESSION);
        $this->files = new Method($this->_FILES);
    }

    /**
     * @return void
     */
    public function getGet()
    {
        return $this->getMethod;
    }

    /**
     * @return void
     */
    public function getPost()
    {
        return $this->postMethod;
    }

    /**
     * @return void
     */
    public function getSession()
    {
        return $this->session;
    }

    public function getFiles()
    {
        return $this->files;
    }
}
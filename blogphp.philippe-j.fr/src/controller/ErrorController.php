<?php

namespace App\src\controller;

/**
 * Class ErrorController
 */
class ErrorController extends BlogController
{
    /**
     * @return void
     */
    public function errorNotFound()
    {
        return $this->view->render('error_404');
    }

    /**
     * @return void
     */
    public function errorServer()
    {
        return $this->view->render('error_500');
    }
}
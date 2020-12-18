<?php

namespace App\src\controller;

use App\Framework\Method;

/**
 * Class FrontController
 */
class FrontController extends BlogController
{
    /**
     * @return void
     */
    public function home()
    {
        $posts = $this->postDAO->getPosts();
        return $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function post($postId)
    {
        $post = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getCommentsFromPost($postId);
        return $this->view->render('pagePost', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * @param Method $postMethod
     * @param mixed $postId
     * 
     * @return void
     */
    public function addComment(Method $postMethod, $postId)
    {
        if ($postMethod->getParameter('submit')) {
            $errors = $this->validation->validate($postMethod, 'Comment');
            if (!$errors) {
                $this->commentDAO->addComment($postMethod, $postId);
                $this->session->set('add_comment', 'Votre commentaire est enregistré. Il sera visible après validation par l\'administrateur, ');
            }
            $post = $this->postDAO->getPost($postId);
            $comments = $this->commentDAO->getCommentsFromPost($postId);
            return $this->view->render('pagePost', [
                'post' => $post,
                'comments' => $comments,
                'postMethod' => $postMethod,
                'errors' => $errors
            ]);
        }
    }



    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function contact(Method $postMethod)
    {
        if ($postMethod->getParameter('submit')) {
            $errors = $this->validation->validate($postMethod, 'Email');
            if (!$errors) {
                $this->userDAO->contactEmail($postMethod);
                $this->session->set('message', 'Votre email a bien été envoyé');
                header('Location: /home');
            } else {
                $this->session->set('error_email', 'Votre email n\'a pas été envoyé');
                return $this->view->render('contact', [
                    'postMethod' => $postMethod,
                    'errors' => $errors
                ]);
            }
        }
        return $this->view->render('contact');
    }


    /**
     * @return void
     */
    public function profile()
    {
        if ($this->checkLoggedIn()) {
            $pseudo = $this->session->get('pseudo');
            $comments = $this->commentDAO->getCommentsByPseudo($pseudo);
            $posts = $this->postDAO->getPostsFromPseudo($pseudo);
            $user = $this->userDAO->getUser($pseudo);
            return $this->view->render('profile', [
                'user' => $user,
                'pseudo' => $pseudo,
                'posts' => $posts,
                'comments' => $comments
            ]);
        }
    }

    /**
     * @return void
     */
    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->stop();
            $this->session->start();
            $this->session->set('message', 'À bientôt ' . $this->session->get('pseudo'));
            header('Location: /home');
        }
    }

    
    /**
     * @return void
     */
    public function checkLoggedIn()
    {
        if (!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ?route=login');
        } else {
            return true;
        }
    }
}

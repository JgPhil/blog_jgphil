<?php

namespace App\src\controller;

use App\Entity\Post;
use App\Framework\Method;
use App\Framework\Upload;
use App\Framework\View;

/**
 * Class BackController
 */
class BackController extends BlogController

{


    /**
     * @return void
     */
    private function checkAdmin()
    {
        if (!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ?route=profile');
        } else {
            return true;
        }
    }

    /**
     * @return void
     */
    public function administration()
    {
        if ($this->checkAdmin()) {
            $posts = $this->postDAO->getPosts();
            $users = $this->userDAO->getUsers();
            $comments = $this->commentDAO->getComments();

            return $this->view->render('administration', [
                'posts' => $posts,
                'users' => $users,
                'comments' => $comments
            ]);
        }
    }

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function addPost(Method $postMethod)
    {
        $target = "blog";
        $name = null;
        if ($this->checkAdmin()) {
            if ($postMethod->getParameter('submit')) {
                $errors = $this->validation->validate($postMethod, 'Post');
                if (!$errors) {
                    $postId = $this->postDAO->addPost($postMethod, $this->session->get('id'));
                    if (!empty($this->files->getParameter('userfile')['name'])) {
                        $file = new Upload;
                        $name = $file->uploadFile($target);
                        $this->pictureDAO->addPostPicture($name, $postId);
                    }
                    $this->session->set('admin_message', 'Le nouvel article a bien été ajouté');
                    header('Location: ?route=administration');
                }
                return $this->view->render('add_post', [
                    'postMethod' => $postMethod,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_post');
        }
    }


    /**
     * @param Method $postMethod
     * @param mixed $postId
     * @return View
     */
    public function editPost(Method $postMethod, $postId)
    {
        $target = "blog";
        $name = null;
        if ($this->checkAdmin()) {
            $post = $this->postDAO->getPost($postId);
            if ($postMethod->getParameter('submit')) {
                $errors = $this->validation->validate($postMethod, 'Post');
                if (!$errors) {
                    if (!empty($this->files->getParameter('userfile')['name'])) {
                        $file = new Upload;
                        $name = $file->uploadFile($target);
                        $this->pictureDAO->updatePostPicture($postId, $name);
                    }
                    $this->postDAO->editPost($postMethod, $postId, $this->session->get('id'));
                    $this->session->set('admin_message', 'L\' article a bien été modifié');
                    header('Location: ?route=administration');
                }
                return $this->view->render('edit_post', [
                    'postMethod' => $postMethod,
                    'errors' => $errors
                ]);
            }
            $postMethod->setParameter('id', $post->getId());
            $postMethod->setParameter('title', $post->getTitle());
            $postMethod->setParameter('heading', $post->getHeading());
            $postMethod->setParameter('content', $post->getContent());
            $postMethod->setParameter('author', $post->getAuthor());
            $postMethod->setParameter('picturePath', $post->getPicture());
            return $this->view->render('edit_post', [              // préremplissage du formulaire
                'postMethod' => $postMethod
            ]);
        }
    }


    public function trash($id)
    {
        if ($this->checkAdmin()) {
            switch ($this->getMethod->getParameter('route')) {
                case 'hideUser':
                    $this->userDAO->hideUser($id);
                    $this->session->set('admin_message', 'L\'utilisateur a été envoyé vers la corbeille');
                    break;
                case 'hidePost':
                    $this->postDAO->hidePost($id);
                    $this->session->set('admin_message', 'L\'article a été envoyé vers la corbeille');
                    break;
                case 'hideComment':
                    $this->commentDAO->hideComment($id);
                    $this->session->set('admin_message', 'Le commentairee a été envoyé vers la corbeille');
                    break;
            }
            header('Location: ?route=administration');
        }
    }

    public function show($id)
    {
        if ($this->checkAdmin()) {
            switch ($this->getMethod->getParameter('route')) {
                case 'showUser':
                    $this->userDAO->showUser($id);
                    $this->session->set('admin_message', 'L\'utilisateur est à nouveau visible sur la page d\'administration');
                    break;
                case 'showPost':
                    $this->postDAO->showPost($id);
                    $this->session->set('admin_message', 'L\'article est à nouveau visible sur la page d\'administration');
                    break;
                case 'showComment':
                    $this->commentDAO->showComment($id);
                    $this->session->set('admin_message', 'Le commentaire est à nouveau visible sur la page d\'administration');
                    break;
            }
            header('Location: ?route=trash');
        }
    }


    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function postComments($postId)
    {
        if ($this->checkAdmin()) {
            $comments = $this->commentDAO->getCommentsFromPost($postId);

            if ($comments) {
                return $this->view->render('postComments', [
                    'comments' => $comments
                ]);
            }

            print_r('<script>
            alert("Pas de commentaire sur cet article");
            window.location.href="?route=administration"</script>');
        }
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function validateComment($commentId)
    {
        $this->commentDAO->validateComment($commentId);
        $this->session->set('admin_message', 'commentaire validé');
        header('Location: ?route=administration');
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function inValidateComment($commentId)
    {
        $this->commentDAO->inValidateComment($commentId);
        $this->session->set('admin_message', 'commentaire invalidé');
        header('Location: ?route=administration');
    }


    /**
     * @return void
     */
    public function emptyTrash()
    {
        if ($this->checkAdmin()) {
            $this->userDAO->eraseUser();
            $this->postDAO->erasePost();
            $this->commentDAO->eraseComment();
            $this->session->set('admin_message', 'La corbeille a été vidée');
            header('Location: ?route=administration');
        }
    }
}

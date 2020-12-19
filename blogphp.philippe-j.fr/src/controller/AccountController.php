<?php

namespace App\src\controller;

use App\Framework\Method;
use App\Framework\Upload;

/**
 * Class BackController
 */
class AccountController extends BlogController
{



    /**
     * @param Method $postMethod
     * 
     * @return View
     */
    public function register(Method $postMethod)
    {
        if ($postMethod->getParameter('submit')) {
            $errors = $this->validation->validate($postMethod, 'User');
            if ($this->userDAO->checkUser($postMethod)) {
                $errors['pseudo'] = $this->userDAO->checkUser($postMethod);
            }
            if (!$errors) {
                $target = "user";
                $userId = $this->userDAO->register($postMethod);
                if ($this->files->getParameter('userfile')['name']) {
                    $file = new Upload;
                    $name = $file->uploadFile($target);
                    $this->pictureDAO->addUserPicture($name, $userId);
                }
                $this->session->set('message', 'votre inscription a bien été éffectuée, Merci de cliquer sur le lien présent dans le mail de confirmation qui vient de vous être envoyé.');
                return $this->view->render('register2');
            }

            return $this->view->render('register', [
                'postMethod' => $postMethod,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function updateUserPicture(Method $postMethod)
    {
        if ($postMethod->getParameter('submit')) {
            $target = "user";
            $file = new Upload;
            $name = $file->uploadFile($target);
            $userId = $this->session->get('id');
            if (!empty($this->files->getParameter('userfile')['name'])) {
                $checkUserPicture = $this->pictureDAO->checkUserPicture($userId);
                if ($checkUserPicture) {
                    $this->pictureDAO->updateUserPicture($name, $userId);
                } else {
                    $this->pictureDAO->addUserPicture($name, $userId);
                }
                $this->session->set('profile_message', 'Votre image a été changée');
                header('Location: ../public/index.php?route=profile');
            }
        }
        return $this->view->render('update_user_picture', [
            'postMethod' => $postMethod
        ]);
    }


    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function desactivateAccount($pseudo)
    {
        $this->userDAO->desactivateAccount(filter_var($this->session->get('pseudo'), FILTER_SANITIZE_STRING));
        $this->session->set('message', 'Votre compte a bien été désactivé');
        header('Location: ../public/index.php');
    }


    /**
     * @param Method $getMethod
     * 
     * @return void
     */
    public function emailConfirm(Method $getMethod)
    {

        if (!empty($this->userDAO->emailConfirm($getMethod))) {
            $this->userDAO->tokenErase(filter_var($getMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING));
            $this->userDAO->activateAccount(filter_var($getMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING));
            $this->session->set('email_confirmation', 'Votre compte est à présent activé. Bienvenue ! <br> Vous pouvez maintenant vous connecter avec vos identifiants et mot de passe.');
            return $this->view->render('register3');
        }
        $this->userDAO->tokenErase(filter_var($getMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING));
        $this->userDAO->deleteUser(filter_var($getMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING));
        $this->session->set('error_account', 'Il y a eu un problème, merci de vous réinscrire ');
        return $this->view->render('error_account');
    }



    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function login(Method $postMethod)
    {
        if ($postMethod->getParameter('submit')) {
            $result = $this->userDAO->login($postMethod);
            if ($result && $result['isPasswordValid']) {
                $this->session->set('message', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $postMethod->getParameter('pseudo'));
                $this->session->set('picturePath', $result['picturePath']);
                header('Location: /');
            } else {
                $this->session->set('error_login', 'Vos identifiants sont incorrects');
                return $this->view->render('login', [
                    'postMethod' => $postMethod
                ]);
            }
        }
        return $this->view->render('login');
    }


    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function updatePassword(Method $postMethod)
    {
        if ($this->checkLoggedIn()) {
            if ($postMethod->getParameter('submit')) {
                $errors = $this->validation->validate($postMethod, 'User');
                if (!$errors) {
                    $this->userDAO->updatePassword($postMethod, $this->session->get('pseudo'));
                    $this->session->set('profile_message', 'Votre mot de passe a été mis à jour ' . $this->session->get('pseudo'));
                    header('Location: ../public/profile.php');
                }
                return $this->view->render('update_password', [
                    'postMethod' => $postMethod,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('update_password');
        }
    }

    /**
     * @return void
     */
    public function checkLoggedIn()
    {
        if (!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }


    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function activateAccount($pseudo)
    {
        $this->userDAO->activateAccount($pseudo);
        $this->session->set('admin_message', 'Le compte vient d\'être activé !');
        header('Location: ../public/index.php?route=administration');
    }


    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function desactivateAccountAdmin($pseudo)
    {
        $this->userDAO->desactivateAccount($pseudo);
        $this->session->set('admin_message', 'Le compte a bien été désactivé');
        header('Location: ../public/index.php?route=administration');
    }


    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function setAdmin($pseudo)
    {
        $this->userDAO->setAdmin($pseudo);
        $this->session->set('admin_message', 'Le rôle "admin" a bien été appliqué à l\'utilisateur ' . $pseudo);
        header('Location: ../public/index.php?route=administration');
    }
}

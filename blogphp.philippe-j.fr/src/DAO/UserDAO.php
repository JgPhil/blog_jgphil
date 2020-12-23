<?php

namespace App\src\DAO;

use App\Framework\DAO;
use App\Framework\Method;
use App\src\model\User;
use App\Framework\Mail;

/**
 * Class UserDAO
 */
class UserDAO extends DAO
{
    /**
     * @return void
     */
    public function getUsers()
    {
        $sql = 'SELECT user.id AS id, user.pseudo AS pseudo,DATE_FORMAT(user.createdAt, "%d/%m/%Y à %H:%i") 
        AS createdAt, role.name AS role, user.activated AS activated, user.visible as visible,  user.erasedAt as erasedAt FROM user
        INNER JOIN role ON user.role_id = role.id ORDER BY user.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function getUser($pseudo)
    {
        $sql = 'SELECT user.id AS id, user.email as email, user.createdAt as createdAt FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$pseudo]);
        $result = $data->fetch();
        $user = $this->buildObject($result);
        return $user;
    }

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function register(Method $postMethod)
    {
        $this->checkUser($postMethod);
        $mail = new Mail;
        $token = $mail->createToken();
        $sql = 'INSERT INTO user (pseudo, password, email, activated, role_id, createdAt) VALUES (?, ?, ?, 0, 2, NOW())';
        $this->createQuery($sql, [
            filter_var($postMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING),
            password_hash(filter_var($postMethod->getParameter('password'), FILTER_SANITIZE_STRING), PASSWORD_BCRYPT),
            filter_var($postMethod->getParameter('email'), FILTER_SANITIZE_EMAIL)
        ]);
        $sql = 'SELECT LAST_INSERT_ID()';
        $result = $this->createQuery($sql);
        $data = $result->fetch();
        $userId = $data[0];
        $sql = ' INSERT INTO token (user_id, token, createdAt) VALUES (LAST_INSERT_ID(), ?, NOW())';
        $this->createQuery($sql, [$token]);
        $mail->registerMail($postMethod, $token);
        return $userId;
    }

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function contactEmail(Method $postMethod)
    {
        $mail = new Mail;
        $sql = 'INSERT INTO contact (name, email, message, phone, createdAt) VALUES (?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [
            filter_var($postMethod->getParameter('name'), FILTER_SANITIZE_STRING),
            filter_var($postMethod->getParameter('email'), FILTER_SANITIZE_EMAIL),
            filter_var($postMethod->getParameter('message'), FILTER_SANITIZE_STRING),
            filter_var($postMethod->getParameter('phone'), FILTER_SANITIZE_NUMBER_INT)
        ]);
        $mail->contactMail($postMethod);
    }

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function checkUser(Method $postMethod)
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [filter_var($postMethod->getParameter('pseudo'), FILTER_SANITIZE_STRING)]);
        $pseudoExists = $result->fetchColumn();
        if ($pseudoExists) {
            return 'Le pseudo existe déjà';
        }
    }

    

    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function login(Method $postMethod)
    {
        $sql = 'SELECT user.id , user.role_id, user.password, role.name FROM user 
        INNER JOIN role ON role.id = user.role_id WHERE pseudo = ? AND activated = 1';
        $data = $this->createQuery($sql, [$postMethod->getParameter('pseudo')]);
        $result = $data->fetch();
        if ($result) {
            $isPasswordValid = password_verify(filter_var($postMethod->getParameter('password'), FILTER_SANITIZE_STRING), $result['password']);
            return [
                'result' => $result, //array
                'isPasswordValid' => $isPasswordValid
            ];
        }
    }

    /**
     * @param Method $getMethod
     * 
     * @return void
     */
    public function emailConfirm(Method $getMethod)
    {
        $sql = 'SELECT token, createdAt FROM token WHERE user_id = (SELECT id FROM user WHERE pseudo = ?)';
        $data = $this->createQuery($sql, [$getMethod->getParameter('pseudo')]);
        $result = $data->fetch();
        if (!empty($result['token'])) {
            if ($getMethod->getParameter('token') === $result['token'] && time() < (strtotime($result['createdAt']) + (48 * 60 * 60))) {
                return $result;
            }
        }
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function tokenErase($pseudo)
    {
        $sql = 'DELETE FROM token WHERE user_id = (SELECT id FROM user WHERE pseudo = ?)';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * @param Method $postMethod
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function updatePassword(Method $postMethod, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash(filter_var($postMethod->getParameter('password'), FILTER_SANITIZE_STRING), PASSWORD_BCRYPT), $pseudo]);
    }

    public function deleteUser($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?' ;
        $this->createQuery($sql,[ $pseudo]);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function desactivateAccount($pseudo)
    {
        $sql = 'UPDATE comment SET validate = 0 WHERE user_id IN
        (SELECT id FROM user WHERE pseudo = ?)';
        $this->createQuery($sql, [$pseudo]);
        $sql = 'UPDATE user SET activated = 0 WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function activateAccount($pseudo)
    {
        $sql = 'UPDATE user SET activated = 1 WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * @param mixed $userId
     * 
     * @return void
     */
    public function hideUser($userId)
    {
        $sql = 'UPDATE comment SET visible = 0 WHERE user_id = ?';
        $this->createQuery($sql, [$userId]);
        $sql = 'UPDATE user SET visible = 0 WHERE id = ?';
        $this->createQuery($sql, [$userId]);
        $this->desactivateAccount($userId);
    }

    /**
     * @param mixed $userId
     * 
     * @return void
     */
    public function showUser($userId)
    {
        $sql = 'UPDATE user SET visible = 1 WHERE id = ?';
        $this->createQuery($sql, [$userId]);
        $sql = 'UPDATE comment SET visible = 1 WHERE user_id = ? ';
        $this->createQuery($sql, [$userId]);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function setAdmin($pseudo)
    {
        $sql = 'UPDATE user SET role_id = 1 WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * @return void
     */
    public function eraseUser()
    {
        $sql = 'UPDATE user SET erasedAt = NOW() WHERE visible = 0 ';
        $this->createQuery($sql);
    }


    /**
     * @param mixed $userId
     * 
     * @return void
     */
    public function getUserPicture($userId)
    {
        $sql = 'SELECT name FROM picture WHERE user_id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $row = $result->fetch(); //array
        $result->closeCursor();
        $picture = new PictureDAO;
        return  $picture->buildObject($row);
    }
}

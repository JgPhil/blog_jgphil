<?php

namespace App\src\DAO;

use App\Framework\Method;
use App\Framework\DAO;

/**
 * Class PictureDAO
 */
class PictureDAO extends DAO
{
    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function getPostPicture($postId)
    {

        $sql = 'SELECT name FROM picture WHERE post_id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $name = $result->fetch();
        $result->closeCursor();
        return $name;
    }

    /**
     * @param mixed $name
     * @param mixed $postId
     * 
     * @return void
     */
    public function addPostPicture($name, $postId)
    {
        $sql = 'INSERT INTO picture (name, post_id) VALUES (?, ?)';
        $this->createQuery($sql, [$name, $postId]);
    }

    /**
     * @param mixed $name
     * @param mixed $userId
     * 
     * @return void
     */
    public function addUserPicture($name, $userId)
    {
        $sql = 'INSERT INTO picture (name, user_id) VALUES (?, ?)';
        $this->createQuery($sql, [$name, $userId]);
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
        $name = $result->fetch();
        $result->closeCursor();
        return $name;
    }

    /**
     * @param mixed $userId
     * 
     * @return void
     */
    public function checkUserPicture($userId)
    {
        $sql = 'SELECT COUNT(user_id) FROM picture WHERE user_id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $pictureExists = $result->fetchColumn();
        return $pictureExists;
    }

    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function checkPostPicture($postId)
    {
        $sql = 'SELECT COUNT(post_id) FROM picture WHERE post_id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $pictureExists = $result->fetchColumn();
        return $pictureExists;
    }

    /**
     * @param mixed $name
     * @param mixed $userId
     * 
     * @return void
     */
    public function updateUserPicture($name, $userId)
    {
        $sql = 'UPDATE picture SET name = ? WHERE user_id = ?';
        $this->createQuery($sql, [$name, $userId]);
    }

    /**
     * @param mixed $postId
     * @param mixed $name
     * 
     * @return void
     */
    public function updatePostPicture($postId, $name)
    {
        $checkPostPicture = $this->checkPostPicture($postId);
        if ($checkPostPicture) {
            $sql = 'UPDATE picture SET name = ? WHERE post_id = ?';
            $this->createQuery($sql, [$name, $postId]);
        } else {
            $this->addPostPicture($name, $postId);
        }
    }
}

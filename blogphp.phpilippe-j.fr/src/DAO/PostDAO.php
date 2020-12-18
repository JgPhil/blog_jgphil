<?php

namespace App\src\DAO;

use App\Framework\Method;
use App\src\model\Post;
use App\Framework\DAO;

/**
 * Class PostDAO
 */
class PostDAO extends DAO
{
    /**
     * @return void
     */
    public function getPosts()
    {
        $sql = 'SELECT post.id, post.title, post.content, post.heading, user.pseudo as author, 
        DATE_FORMAT(post.lastUpdate, "%d/%m/%Y à %H:%i") AS lastUpdate, post.visible AS visible, post.erasedAt AS erasedAt FROM post 
        INNER JOIN user ON post.user_id=user.id ORDER BY post.id DESC';
        $result = $this->createQuery($sql);
        $posts = [];
        foreach ($result as $row) {
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row); //conversion du tableau par la method buildObject
        }
        $result->closeCursor();
        return $posts; //Tableau d'objets Post et tableau de chemins d'images
    }

    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function getPost($postId)
    {
        $sql = 'SELECT post.id, post.title, post.content, post.heading, user.pseudo as author,
        DATE_FORMAT(post.lastUpdate, "%d/%m/%Y à %H:%i") AS lastUpdate FROM post
        INNER JOIN user ON post.user_id=user.id WHERE post.id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $post = $this->buildObject($result->fetch());
        $result->closeCursor();
        return $post;
    }

    /**
     * @param Method $postMethod
     * @param mixed $userId
     * 
     * @return void
     */
    public function addPost(Method $postMethod, $userId)
    {
        $sql = 'INSERT INTO post (title, content, heading, user_id, lastUpdate) VALUES (?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [
            filter_var($postMethod->getParameter('title'), FILTER_SANITIZE_STRING),
            filter_var($postMethod->getParameter('content'), FILTER_SANITIZE_STRING),
            filter_var($postMethod->getParameter('heading'), FILTER_SANITIZE_STRING),
            $userId
        ]);
        $sql = 'SELECT LAST_INSERT_ID()';
        $result = $this->createQuery($sql);
        $data = $result->fetch();
        $postId = $data[0];
        return $postId;
    }

    /**
     * @param Method $postMethod
     * @param mixed $postId
     * @param mixed $userId
     * 
     * @return void
     */
    public function editPost(Method $postMethod, $postId, $userId)
    {
        $sql = 'UPDATE post SET title=:title, heading=:heading, content=:content, user_id=:user_id, lastUpdate=NOW() WHERE id=:postId';
        $this->createQuery($sql, [
            'title' => filter_var($postMethod->getParameter('title'), FILTER_SANITIZE_STRING),
            'heading' => filter_var($postMethod->getParameter('heading'), FILTER_SANITIZE_STRING),
            'content' => filter_var($postMethod->getParameter('content'), FILTER_SANITIZE_STRING),
            'user_id' => $userId,
            'postId' => $postId
        ]);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function getPostsFromPseudo($pseudo) //profile page
    {
        $sql = 'SELECT  post.lastUpdate as lastUpdate, post.content as content, post.id as id, post.title as title   FROM post INNER JOIN user ON post.user_id = user.id WHERE user.pseudo = ?';
        $result = $this->createQuery($sql, [$pseudo]);
        $posts = []; // array
        foreach ($result as $row) {
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row); //conversion par la method buildObject
        }
        $result->closeCursor();
        return $posts; //object
    }


    /**
     * @param mixed $postId
     * 
     * @return  User
     */
    public function getUserFromPost($postId)
    {
        $sql =
            'SELECT user.id, user.pseudo, role.name AS role, 
        DATE_FORMAT(user.createdAt, "%d/%m/%Y à %H:%i")AS createdAt
        FROM post 
        INNER JOIN user on user.id=post.user_id
        INNER JOIN role on role.id=user.role_id
        WHERE post.id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $row = $result->fetch(); //array
        $result->closeCursor();
        $user = new UserDAO;
        return  $user->buildObject($row);
    }

    /**
     * @param mixed $postId
     * 
     * @return Post
     */
    public function getPostPicture($postId)
    {
        $sql = 'SELECT name FROM picture WHERE post_id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $row = $result->fetch(); //array
        $result->closeCursor();
        $picture = new PictureDAO;
        return  $picture->buildObject($row);
    }


    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function hidePost($postId)
    {
        $sql = 'UPDATE post SET visible = 0 WHERE id = ?';
        $this->createQuery($sql, [$postId]);
    }

    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function showPost($postId)
    {
        $sql = 'UPDATE post SET visible = 1 WHERE id = ?';
        $this->createQuery($sql, [$postId]);
    }

    /**
     * @return void
     */
    public function erasePost() //delete in the trash
    {
        $sql = 'UPDATE post SET erasedAt = NOW() WHERE visible = 0';
        $this->createQuery($sql);
    }
}

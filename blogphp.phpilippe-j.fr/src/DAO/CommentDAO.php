<?php

namespace App\src\DAO;

use App\src\model\Comment;
use App\Framework\Method;
use App\Framework\DAO;

/**
 * Class CommentDAO
 */
class CommentDAO extends DAO
{
    /**
     * @return void
     */
    public function getComments()
    {
        $sql = 'SELECT id, user_id, content, visible, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS createdAt, validate, post_id, erasedAt FROM comment ORDER BY createdAt DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        foreach ($result as $row)
        {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    /**
     * @param mixed $postId
     * 
     * @return void
     */
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT comment.id AS id, comment.user_id AS user_id, comment.content AS content, 
        DATE_FORMAT(comment.createdAt, "%d/%m/%Y à %H:%i") AS createdAt,
          comment.validate AS validate, comment.post_id AS post_id FROM comment JOIN post 
        ON comment.post_id = post.id WHERE post_id = ? ORDER BY comment.createdAt DESC';
        $result = $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) 
        {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments ;
    }


    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function hideComment($commentId)
    {
        $sql = 'UPDATE comment SET visible = 0 WHERE id = ?';
        $this->createQuery($sql, [$commentId]);        
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function showComment($commentId)
    {
        $sql = 'UPDATE comment SET visible = 1 WHERE id = ?';
        $this->createQuery($sql, [$commentId]);  
    }

    /**
     * @param Method $postMethod
     * @param mixed $postId
     * 
     * @return void
     */
    public function addComment(Method $postMethod, $postId)
    {
        $sql = 'INSERT INTO comment(user_id, content, createdAt, post_id) VALUES(?,?,NOW(),?)';
        $this->createQuery($sql, [
            filter_var($postMethod->getParameter('id'), FILTER_SANITIZE_NUMBER_INT), 
            filter_var($postMethod->getParameter('content'), FILTER_SANITIZE_STRING),
            $postId
            ]);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function getCommentsByPseudo($pseudo) // Profile 
    {
        $sql = 'SELECT comment.id AS id, comment.user_id AS user_id, comment.content AS content,
         DATE_FORMAT(comment.createdAt, "%d/%m/%Y à %H:%i") AS createdAt, comment.post_id AS post_id, comment.validate AS validate 
         FROM comment INNER JOIN user ON comment.user_id = user.id WHERE user.pseudo = ?';
        $result = $this->createQuery($sql, [$pseudo]);
        $comments = [];
        foreach ($result as $row) 
        {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function validateComment($commentId)
    {
        $sql = 'UPDATE comment  SET validate = 1 WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function invalidateComment($commentId)
    {
        $sql = 'UPDATE comment  SET validate = 0 WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function getPostFromComment($commentId)
    {
        $sql = 'SELECT post.id, post.title, post.content, post.heading, post.user_id as author, comment.id, 
        DATE_FORMAT(post.lastUpdate, "%d/%m/%Y à %H:%i") AS lastUpdate FROM comment 
        INNER JOIN post on post.id=comment.post_id  WHERE comment.id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $row = $result->fetch(); //array
        $result->closeCursor();
        $post = new PostDAO;
        return  $post->buildObject($row); 
    }  

    /**
     * @param mixed $commentId
     * 
     * @return void
     */
    public function getUserFromComment($commentId)
    {
        $sql = 'SELECT user.pseudo AS pseudo, user.id AS id,  DATE_FORMAT(user.createdAt, "%d/%m/%Y à %H:%i") AS createdAt 
        FROM comment INNER JOIN user ON user.id = comment.user_id   WHERE comment.id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $row = $result->fetch(); //array
        $result->closeCursor();
        $user = new UserDAO;
        return  $user->buildObject($row); 
    }  


    /**
     * @return void
     */
    public function eraseComment()
    {
        $sql = 'UPDATE comment SET erasedAt = NOW() WHERE visible = 0';
        $this->createQuery($sql);
    }
}
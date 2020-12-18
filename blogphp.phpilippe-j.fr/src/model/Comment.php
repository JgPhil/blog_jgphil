<?php

namespace App\src\model;

use App\src\DAO\CommentDAO;

/**
 * Class Comment
 */
class Comment
{
    private $id;
    private $user_id;
    private $content;
    private $createdAt;
    private $post_id;
    private $validate;
    private $postObj; // Post Object refers to post_id.
    private $post = null;
    private $userObj;
    private $user = null;
    private $visible;
    private $erasedAt;

    /**
     * @return void
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * 
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return void
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * 
     * @return void
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return void
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * 
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

     /**
      * @return void
      */
     public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * 
     * @return void
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return void
     */
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     * 
     * @return void
     */
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * @return void
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * @param mixed $validate
     * 
     * @return void
     */
    public function setValidate($validate)
    {
        $this->validate= $validate;
    }

    /**
     * @return void
     */
    public function getPostObj()
    {
        $this->postObj = new CommentDAO ; // Instanciation de la classe CommentDAO, puis appel de la ...
        return $this->postObj->getPostFromComment($this->id); // ...méthode getPostFromComment() qui retourne un objet "Post"
    }

    /**
     * @return void
     */
    public function getPost()
    {
        if (empty($this->post))
            {
               $this->post = $this->getPostObj($this->id);
            }
        return $this->post;
    }

    /**
     * @return void
     */
    public function getUserObj()
    {
        $this->userObj = new CommentDAO;
        return $this->userObj->getUserFromComment($this->id);
    }

    /**
     * @return void
     */
    public function getUser()
    {
        if (empty($this->user))
            {
               $this->user = $this->getUserObj($this->id);
            }
        return $this->user;
    }

    /**
     * @return void
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param mixed $visible
     * 
     * @return void
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return void
     */
    public function getErasedAt()
    {
        return $this->erasedAt;
    }

    /**
     * @param mixed $erasedAt
     * 
     * @return void
     */
    public function setErasedAt($erasedAt)
    {
        $this->erasedAt = $erasedAt;
    }
}
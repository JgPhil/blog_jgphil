<?php

namespace App\src\model;

use App\src\DAO\PostDAO;

/**
 * Class Post
 */
class Post
{
    private $id;
    private $title;
    private $content;
    private $heading;
    private $author;
    private $lastUpdate;
    private $visible;
    private $userObj;
    private $user;
    private $erasedAt;
    private $pictureObj;
    private $picture;
    


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
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * @param mixed $title
     * 
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @return void
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param mixed $heading
     * 
     * @return void
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * 
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return void
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * @param mixed $lastUpdate
     * 
     * @return void
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
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
    public function getUserObj()
    {
        $this->userObj = new PostDAO; // Instanciation de la classe UserDAO, puis appel de la ...
        return $this->userObj->getUserFromPost($this->id); // ...méthode getUserFromPost() qui retourne un objet "User"
    }

    /**
     * @return void
     */
    public function getUser()
    {
        if (empty($this->user)) {
            $this->user = $this->getUserObj($this->id);
        }
        return $this->user;
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

    /**
     * @return void
     */
    public function getPictureObj()
    {
        $this->pictureObj = new PostDAO;
        return $this->pictureObj->getPostPicture($this->id);

    }

    /**
     * @return void
     */
    public function getPicture()
    {
        if (empty($this->picture))
        {
            $this->picture = $this->getPictureObj($this->id);
            return $this->picture;
        }
    }
}

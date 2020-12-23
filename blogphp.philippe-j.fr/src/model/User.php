<?php

namespace App\src\model;

use App\src\DAO\userDAO;

/**
 * Class User
 */
class User
{
    private $id;
    private $pseudo;
    private $password;
    private $createdAt;
    private $role;
    private $activated;
    private $email;
    private $visible;
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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * 
     * @return void
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return void
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * 
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getRole() 
    {
        return $this->role;
    }
    
    /**
     * @param mixed $role
     * 
     * @return void
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return void
     */
    public function getActivated()
    {
        return $this->activated;
    }
    
    /**
     * @param mixed $activated
     * 
     * @return void
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    /**
     * @return void
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $email
     * 
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * @return void
     */
    public function getPictureObj()
    {
        $this->pictureObj = new UserDAO;
        return $this->pictureObj->getUserPicture($this->id);

    }

    /**
     * @return void
     */
    public function getPicture()
    {
        if (empty($picture))
        {
            $this->picture = $this->getPictureObj($this->id);
            return $this->picture;
        }
    }
} 
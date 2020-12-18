<?php

namespace App\src\model;

/**
 * Class Picture
 */
class Picture
{

    private $id;
    private $name;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * 
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

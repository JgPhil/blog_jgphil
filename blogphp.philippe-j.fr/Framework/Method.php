<?php

namespace App\Framework;

class Method
{
    private $method;

    /**
     * @param mixed $method
     * 
     * @return void
     */
    public function __construct($method)
    {
        $this->method = $method;
    }

    /**
     * @param mixed $name
     * 
     * @return void
     */
    public function getParameter($name)
    {
        if(isset($this->method[$name]))
        {
            return $this->method[$name];
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function setParameter($name, $value)
    {
        $this->method[$name] = $value;
    }
    
    /**
     * @return void
     */
    public function allParameters()
    {
        return $this->method;
    }

}
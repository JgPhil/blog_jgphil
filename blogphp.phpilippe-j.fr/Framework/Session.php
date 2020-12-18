<?php

namespace App\Framework;

class Session
{
    private $session;
    

    /**
     * @param mixed $session
     * 
     * @return void
     */
    public function __construct($session)
    {
        $this->session = $session;
        
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * @param string $name
     * 
     * @return void
     */
    public function get($name = "")
    {
        if(isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }



    public function show($name)
    {
        if(isset($_SESSION[$name]))
        {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
    }

    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public function start()
    {
        session_start();
    }
    
    public function stop()
    {
        session_destroy();
    }

}
<?php

namespace App\Framework;

class Validation 
{
    protected $errors= [];
   

    /**
     * @param mixed $data
     * @param mixed $name
     * 
     * @return void
     */
    public function validate($data, $name)
    {
        $class = CONSTRAINT_PATH.$name.'Validation'; // i.e.: "UserValidation"
        $obj = lcfirst($name).'Validation';
        $obj = new $class;
        $errors = $obj->check($data);
        return $errors;
    }


    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    protected function checkField($name, $value)
    {
        $checkMethod = 'check'.ucfirst($name);
        $error = $this->$checkMethod($name, $value);
        $this->addError($name, $error);
    }



    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function check(Method $postMethod)
    {
        foreach ($postMethod->allParameters() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    /**
     * @param mixed $name
     * @param mixed $error
     * 
     * @return void
     */
    protected function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    
}
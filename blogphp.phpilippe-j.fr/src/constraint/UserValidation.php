<?php

namespace App\src\constraint;
use App\Framework\Method;

/**
 * Class UserValidation
 */
class UserValidation extends BlogValidationComponent
{

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function checkField($name, $value)
    {        
        if($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkPseudo($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('pseudo', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('pseudo', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('pseudo', $value, 255);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkPassword($name, $value)
    {        
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('password', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('password', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('password', $value, 255);
        }
        if($this->constraint->weakPassword($name, htmlspecialchars($value))) {
            return $this->constraint->weakPassword($name, $value);
        }
    }
}
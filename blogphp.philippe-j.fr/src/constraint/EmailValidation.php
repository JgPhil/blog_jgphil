<?php

namespace App\src\constraint;
use App\Framework\Method;


/**
 * Class EmailValidation
 */
class EmailValidation extends BlogValidationComponent
{

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function checkField($name, $value)
    {
        if($name === 'name') {
            $error = $this->checkName($name, htmlspecialchars($value));
            $this->addError($name, $error);
        }
        elseif ($name === 'email') {
            $error = $this->checkEmail($name, htmlspecialchars($value));
            $this->addError($name, $error);
        }
        elseif ($name === 'message') {
            $error = $this->checkMessage($name, htmlspecialchars($value));
            $this->addError($name, $error);
        }
        elseif ($name === 'phone') {
            $error = $this->checkPhone($name, htmlspecialchars($value));
            $this->addError($name, $error);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkName($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('name', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('name', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('name', $value, 255);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkEmail($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('email', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('email', $value, 2);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkMessage($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('message', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('message', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('message', $value, 2047);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkPhone($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('name', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 9)) {
            return $this->constraint->tooShort('name', $value, 9);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 11)) {
            return $this->constraint->tooLong('name', $value, 11);
        }
    }
}
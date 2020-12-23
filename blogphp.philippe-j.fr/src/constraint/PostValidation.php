<?php

namespace App\src\constraint;
use App\Framework\Method;

class PostValidation extends BlogValidationComponent
{
    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function checkField($name, $value)
    {
        if($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'heading') {
            $error = $this->checkHeading($name, $value);
            $this->addError($name, $error);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkTitle($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('titre', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('titre', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('titre', $value, 255);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkContent($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('contenu', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('contenu', $value, 2);
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    private function checkHeading($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('châpo', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('châpo', $value, 2);
        }
        if($this->constraint->tooLong($name, htmlspecialchars($value), 255)) {
            return $this->constraint->tooLong('châpo', $value, 255);
        }
    }
}
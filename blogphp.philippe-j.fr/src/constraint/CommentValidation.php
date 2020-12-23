<?php

namespace App\src\constraint;
use App\Framework\Method;

/**
 * Class CommentValidation
 */
class CommentValidation extends BlogValidationComponent
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
        elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
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
    private function checkContent($name, $value)
    {
        if($this->constraint->blank($name, htmlspecialchars($value))) {
            return $this->constraint->blank('content', $value);
        }
        if($this->constraint->tooShort($name, htmlspecialchars($value), 2)) {
            return $this->constraint->tooShort('content', $value, 2);
        }
    }
}

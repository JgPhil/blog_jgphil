<?php

namespace App\src\constraint;


/**
 * Class Constraint
 */
class Constraint
{   

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function blank($name, $value)
    {
        if(empty($value)) {
            return 'Le champ '.$name.' saisi est vide<';
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * @param mixed $minSize
     * 
     * @return void
     */
    public function tooShort($name, $value, $minSize)
    {
        if(strlen($value) < $minSize) {
            return 'Le champ '.$name.' doit contenir au moins '.$minSize.' caractères<';
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * @param mixed $maxSize
     * 
     * @return void
     */
    public function tooLong($name, $value, $maxSize)
    {
        if(strlen($value) > $maxSize) {
            return 'Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères<';
        }
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * 
     * @return void
     */
    public function weakPassword($name, $value)
    {
        $uppercase = preg_match('@[A-Z]@', $value);
        $lowercase = preg_match('@[a-z]@', $value);
        $number    = preg_match('@[0-9]@', $value);

        if(!$uppercase || !$lowercase || !$number || strlen($value) < 4 || strlen($value) > 255) {
            return 'Le champ "Mot de passe" doit contenir au moins 8 caractères, dont:  au moins un chiffre, une majuscule et une minuscule.';
        }
    }
}
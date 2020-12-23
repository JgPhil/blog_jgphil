<?php
namespace App\src\constraint;

Class Text 
{
    /**
     * @param string $content
     * @param integer $limit
     * 
     * @return void
     */
    public static function excerpt(string $content, int $limit = 145)
    {
        if (mb_strlen($content) < $limit){
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ', $limit); // on coupe le texte au dernier espace, pas au dernier caractère de la limite
        return mb_substr($content, 0, $lastSpace). '...';
    }
    
}
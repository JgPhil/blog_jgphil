<?php

namespace App\Services;

use Symfony\Component\String\Slugger\SluggerInterface;

class Slugify
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function slugify(string $string)
    {
        return $this->slugger->slug($string);
    }
}

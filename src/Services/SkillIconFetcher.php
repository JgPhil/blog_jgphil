<?php

namespace App\Services;

use App\Entity\Post;
use Symfony\Component\Yaml\Yaml;

class SkillIconFetcher
{
    public static function getUrls(Post $post): array
    {
        $skillFile = Yaml::parseFile('../config/skills.yaml');
        $skills = $post->getSkills();

        foreach (array_filter($skills) as $index) {
            $skillsUrls[] = $skillFile[$index];
        }
        return $skillsUrls;
    }
}

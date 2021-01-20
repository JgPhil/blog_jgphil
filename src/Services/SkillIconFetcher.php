<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;

class SkillIconFetcher
{
    public static function getUrls(array $skills): ?array
    {
        $skillsUrls = [];
        $skillFile = Yaml::parseFile('../config/skills.yaml');

        foreach (array_filter($skills) as $index) {
            $skillsUrls[] = $skillFile[$index];
        }
        return $skillsUrls;
    }
}

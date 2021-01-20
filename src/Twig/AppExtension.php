<?php

namespace App\Twig;

use Twig\TwigFilter;
use App\Services\SkillIconFetcher;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('icon_url', [$this, 'iconsUrls']),
        ];
    }

    public function iconsUrls(array $skills): ?array
    {
        return SkillIconFetcher::getUrls($skills);
    }
}
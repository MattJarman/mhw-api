<?php

declare(strict_types=1);

namespace App\Mappers;

use function file_exists;
use function preg_replace;
use function public_path;
use function str_replace;
use function strtolower;
use function url;

abstract class BaseMapper
{
    private const DEFAULT_ITEM_COLOUR = 'white';

    protected function formatFieldForJSON(string $field): ?string
    {
        $lowercase = strtolower($field);
        $underscores = str_replace(' ', '_', $lowercase);
        $withoutWhitespace = preg_replace('/\W/', '', $underscores) ?? $underscores;

        return preg_replace('/_+/', '_', $withoutWhitespace);
    }

    protected function getItemIconUrl(string $name, string $colour): ?string
    {
        $lowercaseName = strtolower($name);
        $lowercaseColour = $colour ? strtolower($colour) : self::DEFAULT_ITEM_COLOUR;
        $path = '/images/items/' . $lowercaseName . '/' . $lowercaseColour . '.png';

        if (! file_exists(public_path($path))) {
            return null;
        }

        return url($path);
    }
}

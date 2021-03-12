<?php

namespace App\Mappers;

abstract class BaseMapper
{
    private const DEFAULT_ITEM_COLOUR = 'white';

    protected function formatFieldForJSON(string $field): ?string
    {
        $lowercase = strtolower($field);
        $underscores = str_replace(' ', '_', $lowercase);
        $withoutWhitespace = preg_replace('/\W/', '', $underscores) ?? $underscores;
        return preg_replace( '/_+/', '_', $withoutWhitespace);
    }

    protected function getItemIconUrl(string $name, string $colour): ?string
    {
        $lowercaseName = strtolower($name);
        $lowercaseColour = $colour ? strtolower($colour) : self::DEFAULT_ITEM_COLOUR;
        $path = "/images/items/$lowercaseName/$lowercaseColour.png";

        if (!file_exists(public_path($path))) {
            return null;
        }

        return url($path);
    }
}

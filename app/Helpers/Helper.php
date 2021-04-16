<?php

declare(strict_types=1);

namespace App\Helpers;

class Helper
{
    /**
     * @param string[] $characters
     * @param int      $size
     * @param string[] $combinations
     *
     * @return string[]
     */
    public static function permute(array $characters, int $size, array $combinations = []): array
    {
        if (empty($combinations)) {
            $combinations = $characters;
        }

        if ($size === 1) {
            return $combinations;
        }

        $newCombinations = [];
        foreach ($combinations as $combination) {
            foreach ($characters as $char) {
                $newCombinations[] = $combination . $char;
            }
        }

        return self::permute($characters, $size - 1, $newCombinations);
    }
}

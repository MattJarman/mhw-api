<?php

declare(strict_types=1);

namespace App\Mappers\Weapon;

use App\Helpers\Helper;

class MelodyPermutationGenerator
{
    private const MIN_MELODY_SIZE = 2;
    private const MAX_MELODY_SIZE = 4;

    /**
     * @param string $notesString
     *
     * @return string[]
     */
    public static function generate(string $notesString): array
    {
        $notes = str_split($notesString);

        $permutations = [];
        for ($i = self::MIN_MELODY_SIZE; $i <= self::MAX_MELODY_SIZE; $i++) {
            $permutations[] = Helper::permute($notes, $i);
        }

        return array_merge(...$permutations);
    }
}

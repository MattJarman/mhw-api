<?php

declare(strict_types=1);

namespace App\Sources;

use stdClass;

class WeaponSource extends BaseSource
{
    /**
     * @param string $language
     *
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->db->select(
            '
            SELECT w.id,
                   wt.name,
                   w.weapon_type AS type,
                   w.rarity
            FROM weapon w
                     JOIN weapon_text wt ON wt.id = w.id AND wt.lang_id = :language
            ORDER BY 1
            ',
            ['language' => $language]
        );
    }
}

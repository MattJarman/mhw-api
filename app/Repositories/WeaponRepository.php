<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Sources\WeaponSource;
use stdClass;

class WeaponRepository implements BaseRepository
{
    private WeaponSource $src;

    public function __construct(WeaponSource $src)
    {
        $this->src = $src;
    }

    /**
     * @param string $language
     *
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->src->index($language);
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>
     */
    public function show(int $id, string $language): array
    {
        $details = $this->src->getDetails($id, $language);

        return [
            'details' => $details,
            'skills' => $this->src->getSkills($id, $language),
            'craftingMaterials' => $this->src->getCraftingMaterials($id, $language),
            'upgradeMaterials' => $this->src->getUpgradeMaterials($id, $language),
            'upgrades' => $this->src->getUpgrades($id, $language),
            'ammo' => $this->src->getAmmo($id),
            'melodies' => $details->notes ? $this->src->getMelodies($details->notes, $language) : null,
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Mappers\Weapon;

use App\Mappers\BaseIndexMapper;
use stdClass;

class WeaponIndexMapper implements BaseIndexMapper
{
    /** @var array<string, mixed>[] */
    private array $weapons;

    /**
     * @param stdClass[] $weapons
     */
    public function __construct(array $weapons)
    {
        $this->weapons = $this->map($weapons);
    }

    /**
     * @return array<string, mixed>[]
     */
    public function get(): array
    {
        return $this->weapons;
    }

    /**
     * @param stdClass[] $weapons
     *
     * @return array<string, mixed>[]
     */
    private function map(array $weapons): array
    {
        $result = [];
        foreach ($weapons as $weapon) {
            $result[] = [
                'id' => (int) $weapon->id,
                'name' => $weapon->name,
                'type' => $weapon->type,
                'rarity' => (int) $weapon->rarity,
                'url' => route('weapon.show', $weapon->id),
            ];
        }

        return $result;
    }
}

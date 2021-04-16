<?php

declare(strict_types=1);

namespace App\Mappers\Weapon;

class WeaponShowMapper
{
    private WeaponShowFieldMapper $fieldMapper;

    /** @var array<string, mixed> $weapon */
    private array $weapon;

    /**
     * @param array<string, mixed> $weapon
     */
    public function __construct(array $weapon)
    {
        $this->fieldMapper = new WeaponShowFieldMapper($weapon);
        $this->weapon = $this->map();
    }

    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return $this->weapon;
    }

    /**
     * @return array<string, mixed>
     */
    private function map(): array
    {
        return [
            'name' => $this->fieldMapper->getName(),
            'type' => $this->fieldMapper->getType(),
            'rarity' => $this->fieldMapper->getRarity(),
            'icon' => $this->fieldMapper->getIcon(),
            'category' => $this->fieldMapper->getCategory(),
            'attack' => $this->fieldMapper->getAttack(),
            'true_attack' => $this->fieldMapper->getTrueAttack(),
            'affinity' => $this->fieldMapper->getAffinity(),
            'defense' => $this->fieldMapper->getDefense(),
            'elderseal' => $this->fieldMapper->getElderseal(),
            'slots' => $this->fieldMapper->getDecoSlots(),
            'elements' => $this->fieldMapper->getElements(),
            'sharpness' => $this->fieldMapper->getSharpness(),
            'skills' => $this->fieldMapper->getSkills(),
            'crafting' => $this->fieldMapper->getCraftingDetails(),
            'kinsect_bonus' => $this->fieldMapper->getKinsectBonus(),
            'phial' => $this->fieldMapper->getPhial(),
            'shelling' => $this->fieldMapper->getShelling(),
            'coatings' => $this->fieldMapper->getCoatings(),
            'ammo' => $this->fieldMapper->getAmmo(),
            'melodies' => $this->fieldMapper->getMelodies(),
        ];
    }
}

<?php

namespace App\Mappers\Monster;

class MonsterShowMapper
{
    private MonsterShowFieldMapper $fieldMapper;

    /** @var array<string, mixed> $monster */
    private array $monster;

    /**
     * MonsterShowMapper constructor.
     * @param array<string, mixed> $monster
     */
    public function __construct(array $monster)
    {
        $this->fieldMapper = new MonsterShowFieldMapper($monster);
        $this->monster = $this->map();
    }

    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return $this->monster;
    }

    /**
     * @return array<string, mixed>
     */
    private function map(): array
    {
        return [
            'name' => $this->fieldMapper->getName(),
            'size' => $this->fieldMapper->getSize(),
            'species' => $this->fieldMapper->getSpecies(),
            'icon' => $this->fieldMapper->getIcon(),
            'colour' => $this->fieldMapper->getColour(),
            'description' => $this->fieldMapper->getDescription(),
            'traps' => $this->fieldMapper->getTraps(),
            'ailments' => $this->fieldMapper->getAilments(),
            'weaknesses' => $this->fieldMapper->getWeaknesses(),
            'locations' => $this->fieldMapper->getLocations(),
            'rewards' => $this->fieldMapper->getRewards(),
            'breaks' => $this->fieldMapper->getBreaks(),
            'hit_zones' => $this->fieldMapper->getHitZones()
        ];
    }
}

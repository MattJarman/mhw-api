<?php

declare(strict_types=1);

namespace App\Mappers\Monster;

use App\Mappers\BaseMapper;
use stdClass;

use function config;
use function strtolower;
use function url;

class MonsterShowFieldMapper extends BaseMapper
{
    private stdClass $details;

    /** @var array<string, string>[] */
    private array $locations;

    /** @var array<string, array<string, array<int, array<string, mixed>>>> */
    private array $rewards;

    /** @var array<string, array<int, array<string, mixed>>> */
    private array $breaks;

    /** @var array<string, array<string, int>> */
    private array $hitZones;

    /**
     * @param array<string, mixed> $monster
     */
    public function __construct(array $monster)
    {
        $this->details = $monster['details'];
        $this->locations = $this->mapLocations($monster['habitats']);
        $this->rewards = $this->mapRewards($monster['rewards']);
        $this->breaks = $this->mapBreaks($monster['breaks']);
        $this->hitZones = $this->mapHitZones($monster['hitZones']);
    }

    public function getName(): string
    {
        return $this->details->name;
    }

    public function getSpecies(): ?string
    {
        return $this->details->ecology;
    }

    public function getIcon(): string
    {
        return url('/images/monster/' . $this->details->id . '.png');
    }

    public function getColour(): ?string
    {
        $config = config('colours.hex');
        if (! $this->details->colour) {
            return null;
        }

        $colour = strtolower($this->details->colour);
        if (! isset($config[$colour])) {
            return null;
        }

        return '#' . $config[$colour];
    }

    public function getSize(): string
    {
        return $this->details->size;
    }

    public function getDescription(): string
    {
        return $this->details->description;
    }

    /**
     * @return bool[]
     */
    public function getTraps(): array
    {
        return [
            'pitfall' => (bool) $this->details->pitfall_trap,
            'shock' => (bool) $this->details->shock_trap,
            'vine' => (bool) $this->details->vine_trap,
        ];
    }

    /**
     * @return bool[]
     */
    public function getAilments(): array
    {
        return [
            'roar' => (bool) $this->details->ailment_roar,
            'wind' => (bool) $this->details->ailment_wind,
            'tremor' => (bool) $this->details->ailment_tremor,
            'defense_down' => (bool) $this->details->ailment_defensedown,
            'fire_blight' => (bool) $this->details->ailment_fireblight,
            'water_blight' => (bool) $this->details->ailment_waterblight,
            'thunder_blight' => (bool) $this->details->ailment_thunderblight,
            'ice_blight' => (bool) $this->details->ailment_iceblight,
            'dragon_blight' => (bool) $this->details->ailment_dragonblight,
            'blast_blight' => (bool) $this->details->ailment_blastblight,
            'regional' => (bool) $this->details->ailment_regional,
            'poison' => (bool) $this->details->ailment_poison,
            'sleep' => (bool) $this->details->ailment_sleep,
            'paralysis' => (bool) $this->details->ailment_paralysis,
            'bleed' => (bool) $this->details->ailment_bleed,
            'stun' => (bool) $this->details->ailment_stun,
            'mud' => (bool) $this->details->ailment_mud,
            'effluvia' => (bool) $this->details->ailment_effluvia,
        ];
    }

    /**
     * @return int[]
     */
    public function getWeaknesses(): array
    {
        return [
            'fire' => (int) $this->details->weakness_fire,
            'water' => (int) $this->details->weakness_water,
            'ice' => (int) $this->details->weakness_ice,
            'thunder' => (int) $this->details->weakness_thunder,
            'dragon' => (int) $this->details->weakness_dragon,
            'poison' => (int) $this->details->weakness_poison,
            'sleep' => (int) $this->details->weakness_sleep,
            'paralysis' => (int) $this->details->weakness_paralysis,
            'blast' => (int) $this->details->weakness_blast,
            'stun' => (int) $this->details->weakness_stun,
        ];
    }

    /**
     * @return array<string, string>[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }

    /**
     * @return array<string, array<string, array<int, array<string, mixed>>>>
     */
    public function getRewards(): array
    {
        return $this->rewards;
    }

    /**
     * @return array<string, array<int, array<string, mixed>>>
     */
    public function getBreaks(): array
    {
        return $this->breaks;
    }

    /**
     * @return array<string, array<string, int>>
     */
    public function getHitZones(): array
    {
        return $this->hitZones;
    }

    /**
     * @param stdClass[] $habitats
     *
     * @return array<string, string>[]
     */
    private function mapLocations(array $habitats): array
    {
        $locations = [];
        foreach ($habitats as $habitat) {
            $locations[] = [
                'location' => $habitat->name,
                'start_area' => $habitat->start_area,
                'move_area' => $habitat->move_area,
                'rest_area' => $habitat->rest_area,
            ];
        }

        return $locations;
    }

    /**
     * @param stdClass[] $rewards
     *
     * @return array<string, array<string, array<int, array<string, mixed>>>>
     */
    private function mapRewards(array $rewards): array
    {
        $mappedRewards = [];
        foreach ($rewards as $reward) {
            $condition = $reward->condition;
            $rankName = $this->formatFieldForJSON($reward->rank);
            $conditionName = $this->formatFieldForJSON($condition);

            $mappedRewards[$rankName][$conditionName][] = [
                'material' => $reward->name,
                'url' => route('item.show', $reward->id),
                'icon_url' => $reward->icon_name
                    ? $this->getItemIconUrl($reward->icon_name, $reward->icon_color)
                    : null,
                'stack' => (int) $reward->stack,
                'percentage' => (int) $reward->percentage,
            ];
        }

        return $mappedRewards;
    }

    /**
     * @param stdClass[] $breaks
     *
     * @return array<string, array<int, array<string, mixed>>>
     */
    private function mapBreaks(array $breaks): array
    {
        $mappedBreaks = [];
        foreach ($breaks as $break) {
            $partName = $this->formatFieldForJSON($break->name);

            $mappedBreaks[$partName][] = [
                'flinch' => (int) $break->flinch,
                'wound' => (int) $break->wound,
                'sever' => (int) $break->sever,
                'extract' => $break->extract,
            ];
        }

        return $mappedBreaks;
    }

    /**
     * @param stdClass[] $hitZones
     *
     * @return array<string, array<string, int>>
     */
    private function mapHitZones(array $hitZones): array
    {
        $mappedHitZones = [];
        foreach ($hitZones as $hitZone) {
            $zoneName = $this->formatFieldForJSON($hitZone->name);

            $mappedHitZones[$zoneName] = [
                'cut' => (int) $hitZone->cut,
                'impact' => (int) $hitZone->impact,
                'shot' => (int) $hitZone->shot,
                'fire' => (int) $hitZone->fire,
                'water' => (int) $hitZone->water,
                'ice' => (int) $hitZone->ice,
                'thunder' => (int) $hitZone->thunder,
                'dragon' => (int) $hitZone->dragon,
                'ko' => (int) $hitZone->ko,
            ];
        }

        return $mappedHitZones;
    }
}

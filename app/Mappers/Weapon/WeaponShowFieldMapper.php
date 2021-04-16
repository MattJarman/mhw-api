<?php

declare(strict_types=1);

namespace App\Mappers\Weapon;

use App\Mappers\BaseMapper;
use Illuminate\Support\Facades\Config;
use stdClass;

class WeaponShowFieldMapper extends BaseMapper
{
    private stdClass $details;

    /** @var array<string, mixed>[] $elements */
    private array $elements;

    /** @var array<string, mixed>|false $sharpness */
    private array | false $sharpness;

    /** @var array<string, mixed>[] $skills */
    private array $skills;

    /** @var array<string, mixed> $craftingDetails */
    private array $craftingDetails;

    /** @var array<string, mixed>|false $ammo */
    private array | false $ammo;

    /** @var array<string, mixed>|false $melodies */
    private array | false $melodies;

    /**
     * @param array<string, mixed> $weapon
     */
    public function __construct(array $weapon)
    {
        $this->details = $weapon['details'];
        $this->elements = $this->mapElements($this->details);
        $this->sharpness = $this->mapSharpness($this->details);
        $this->skills = $this->mapSkills($weapon['skills']);

        $this->craftingDetails = $this->mapCraftingDetails(
            $this->details,
            $weapon['craftingMaterials'],
            $weapon['upgradeMaterials'],
            $weapon['upgrades']
        );

        $this->ammo = $weapon['ammo']
            ? (new WeaponAmmoMapper($weapon['ammo']))->get()
            : false;

        $this->melodies = $weapon['melodies']
            ? $this->mapMelodies($weapon['melodies'])
            : false;
    }

    public function getName(): string
    {
        return $this->details->name;
    }

    public function getType(): string
    {
        return $this->details->type;
    }

    public function getRarity(): int
    {
        return (int) $this->details->rarity;
    }

    public function getIcon(): string
    {
        return url('/images/equipment/' . $this->getType() . '/' . $this->getRarity() . '.png');
    }

    public function getCategory(): ?string
    {
        return $this->details->category;
    }

    public function getAttack(): int
    {
        return (int) $this->details->attack;
    }

    public function getTrueAttack(): int
    {
        return (int) $this->details->true_attack;
    }

    public function getAffinity(): int
    {
        return (int) $this->details->affinity;
    }

    public function getDefense(): int
    {
        return (int) $this->details->defense;
    }

    public function getElderseal(): ?string
    {
        return $this->details->elderseal;
    }

    /**
     * @return array<string, int>
     */
    public function getDecoSlots(): array
    {
        return [
            'slot_1' => (int) $this->details->slot_1,
            'slot_2' => (int) $this->details->slot_2,
            'slot_3' => (int) $this->details->slot_3,
        ];
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * @return array<string, mixed>|false
     */
    public function getSharpness(): array | false
    {
        return $this->sharpness;
    }

    /**
     * @return array<string, mixed>[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @return array<string, mixed>
     */
    public function getCraftingDetails(): array
    {
        return $this->craftingDetails;
    }

    public function getKinsectBonus(): string | bool
    {
        return $this->details->kinsect_bonus ?? false;
    }

    /**
     * @return array<string, mixed>|false
     */
    public function getPhial(): array | false
    {
        if (! $this->details->phial) {
            return false;
        }

        return [
            'type' => $this->details->phial,
            'power' => (int) $this->details->phial_power,
        ];
    }

    /**
     * @return array<string, mixed>|false
     */
    public function getShelling(): array | false
    {
        if (! $this->details->shelling) {
            return false;
        }

        return [
            'type' => $this->details->shelling,
            'level' => (int) $this->details->shelling_level,
        ];
    }

    public function getCoatings(): array | false
    {
        if (! $this->details->coating_close) {
            return false;
        }

        return [
            'close' => (bool) $this->details->coating_close,
            'power' => (bool) $this->details->coating_power,
            'paralysis' => (bool) $this->details->coating_paralysis,
            'poison' => (bool) $this->details->coating_poison,
            'sleep' => (bool) $this->details->coating_sleep,
            'blast' => (bool) $this->details->coating_blast,
        ];
    }

    /**
     * @return array<string, mixed>|false
     */
    public function getAmmo(): array | false
    {
        return $this->ammo;
    }

    public function getMelodies(): array | false
    {
        return $this->melodies;
    }

    /**
     * @param stdClass $details
     *
     * @return array<string, mixed>[]
     */
    private function mapElements(stdClass $details): array
    {
        $mappedElements = [];
        if ($details->element1) {
            $mappedElements[] = [
                'element' => $details->element1,
                'attack' => (int) $details->element1_attack,
                'hidden' => (bool) $details->element_hidden,
            ];
        }

        if ($this->details->element2) {
            $mappedElements[] = [
                'element' => $details->element2,
                'attack' => (int) $details->element2_attack,
                'hidden' => (bool) $details->element_hidden,
            ];
        }

        return $mappedElements;
    }

    /**
     * @param stdClass $details
     *
     * @return array<string, mixed>|false
     */
    private function mapSharpness(stdClass $details): array | false
    {
        if (! $details->sharpness) {
            return false;
        }

        $colours = Config::get('sharpness.names');
        $hits = array_map('intval', explode(',', $details->sharpness));
        $sharpness = ['maxed' => (bool) $details->sharpness_maxed];
        $sharpness['values'] = array_combine($colours, $hits);

        return $sharpness;
    }

    /**
     * @param array<string, mixed>[] $skills
     *
     * @return array<string, mixed>[]
     */
    private function mapSkills(array $skills): array
    {
        $mappedSkills = [];
        foreach ($skills as $skill) {
            $mappedSkills[] = [
                'name' => $skill->name,
                'level' => (int) $skill->level,
                'max_level' => (int) $skill->max_level,
                'is_secret' => (bool) $skill->secret,
            ];
        }

        return $mappedSkills;
    }

    /**
     * @param array<string, mixed>[] $materials
     *
     * @return array<string, mixed>[]
     */
    private function mapMaterials(array $materials): array
    {
        $mappedMaterials = [];
        foreach ($materials as $material) {
            $mappedMaterials[] = [
                'id' => (int) $material->id,
                'name' => $material->name,
                'quantity' => (int) $material->quantity,
                'url' => route('item.show', $material->id),
                'icon_url' => $this->getItemIconUrl($material->icon_name, $material->icon_color),
            ];
        }

        return $mappedMaterials;
    }

    /**
     * @param string $name
     * @param int    $id
     *
     * @return array<string, mixed>
     */
    private function mapWeaponRelationship(string $name, int $id): array
    {
        return [
            'id' => $id,
            'name' => $name,
            'url' => route('weapon.show', $id),
        ];
    }

    /**
     * @param array<string, mixed>[] $upgrades
     *
     * @return array<string, mixed>[]
     */
    private function mapWeaponUpgrades(array $upgrades): array
    {
        $mappedUpgrades = [];
        foreach ($upgrades as $upgrade) {
            $mappedUpgrades[] = $this->mapWeaponRelationship($upgrade->name, (int) $upgrade->id);
        }

        return $mappedUpgrades;
    }

    /**
     * @param stdClass               $details
     * @param array<string, mixed>[] $craftingMaterials
     * @param array<string, mixed>[] $upgradeMaterials
     * @param array<string, mixed>[] $upgrades
     *
     * @return array<string, mixed>
     */
    private function mapCraftingDetails(
        stdClass $details,
        array $craftingMaterials,
        array $upgradeMaterials,
        array $upgrades
    ): array {
        return [
            'is_craftable' => (bool) $details->craftable,
            'is_final' => (bool) $details->is_final,
            'crafting_cost' => $this->mapMaterials($craftingMaterials),
            'upgrade_cost' => $this->mapMaterials($upgradeMaterials),
            'previous_weapon' => $details->previous_weapon_id
                ? $this->mapWeaponRelationship($details->previous_weapon, (int) $details->previous_weapon_id)
                : false,
            'upgrades' => $this->mapWeaponUpgrades($upgrades),
        ];
    }

    /**
     * @param array<string, mixed>[] $melodies
     *
     * @return array<string, mixed>[]
     */
    private function mapMelodies(array $melodies): array
    {
        $mappedMelodies = [];
        foreach ($melodies as $melody) {
            $mappedMelodies[] = [
                'name' => $melody->name,
                'notes' => $melody->notes,
                'effect_1' => $melody->effect1,
                'effect_2' => $melody->effect2,
                'base' => [
                    'duration' => (int) $melody->base_duration,
                    'extension' => (int) $melody->base_extension,
                ],
                'maestro' => [
                    'level_1' => [
                        'duration' => (int) $melody->m1_duration,
                        'extension' => (int) $melody->m1_extension,
                    ],
                    'level_2' => [
                        'duration' => (int) $melody->m2_duration,
                        'extension' => (int) $melody->m2_extension,
                    ],
                ],
            ];
        }

        return $mappedMelodies;
    }
}

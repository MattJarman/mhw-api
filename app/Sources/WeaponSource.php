<?php

declare(strict_types=1);

namespace App\Sources;

use App\Mappers\Weapon\MelodyPermutationGenerator;
use stdClass;

class WeaponSource extends BaseSource
{
    private const ECHO_NOTE = 'E';

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

    public function getDetails(int $id, string $language): stdClass
    {
        return $this->db->selectOne(
            '
            SELECT w.id,
                   wt.name,
                   w.weapon_type AS type,
                   w.rarity,
                   w.category,
                   w.attack,
                   w.attack_true AS true_attack,
                   w.affinity,
                   w.defense,
                   w.elderseal,
                   w.slot_1,
                   w.slot_2,
                   w.slot_3,
                   w.craftable,
                   w.final AS is_final,
                   w.element1,
                   w.element1_attack,
                   w.element2,
                   w.element2_attack,
                   w.element_hidden,
                   w.sharpness,
                   w.sharpness_maxed,
                   w.craftable,
                   w.kinsect_bonus,
                   w.phial,
                   w.phial_power,
                   w.shelling,
                   w.shelling_level,
                   w.coating_blast,
                   w.coating_close,
                   w.coating_paralysis,
                   w.coating_poison,
                   w.coating_power,
                   w.coating_sleep,
                   w.notes,
                   w.previous_weapon_id,
                   prev_wt.name AS previous_weapon
            FROM weapon w
                     JOIN weapon_text wt ON wt.id = w.id AND wt.lang_id = :language
                     LEFT JOIN weapon_text prev_wt ON prev_wt.id = w.previous_weapon_id AND prev_wt.lang_id = :language
            WHERE w.id = :id
        ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>[]
     */
    public function getUpgrades(int $id, string $language): array
    {
        return $this->db->select(
            '
            SELECT w.id,
                   wt.name,
                   w.upgrade_recipe_id
            FROM weapon w
                     JOIN weapon_text wt ON wt.id = w.id AND wt.lang_id = :language
            WHERE w.previous_weapon_id = :id
        ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>[]
     */
    public function getSkills(int $id, string $language): array
    {
        return $this->db->select(
            '
            SELECT wt.id,
                   st.name,
                   ws.level,
                   s.max_level,
                   s.secret,
                   s.icon_color
            FROM weapon_text wt
                     JOIN weapon_skill ws ON ws.weapon_id = wt.id
                     JOIN skilltree s ON s.id = ws.skilltree_id
                     JOIN skilltree_text st ON st.id = s.id AND st.lang_id = :language
            WHERE wt.lang_id = :language
              AND wt.id = :id
        ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>[]
     */
    public function getCraftingMaterials(int $id, string $language): array
    {
        return $this->db->select(
            '
            SELECT i.id,
                   it.name,
                   i.icon_name,
                   i.icon_color,
                   ri.quantity
            FROM weapon w
                     JOIN weapon_text wt ON wt.id = w.id AND wt.lang_id = :language
                     JOIN recipe_item ri ON ri.recipe_id = w.create_recipe_id
                     JOIN item i ON i.id = ri.item_id
                     JOIN item_text it ON it.id = i.id AND it.lang_id = :language
            WHERE w.id = :id
        ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>[]
     */
    public function getUpgradeMaterials(int $id, string $language): array
    {
        return $this->db->select(
            '
            SELECT i.id,
                   it.name,
                   i.icon_name,
                   i.icon_color,
                   ri.quantity
            FROM weapon w
                     JOIN weapon_text wt ON wt.id = w.id AND wt.lang_id = :language
                     JOIN recipe_item ri ON ri.recipe_id = w.upgrade_recipe_id
                     JOIN item i ON i.id = ri.item_id
                     JOIN item_text it ON it.id = i.id AND it.lang_id = :language
            WHERE w.id = :id
        ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }

    public function getAmmo(int $id): ?stdClass
    {
        return $this->db->selectOne(
            '
            SELECT wa.*
            FROM weapon w
                     JOIN weapon_ammo wa ON wa.id = w.ammo_id
            WHERE w.id = :id
        ',
            ['id' => $id]
        );
    }

    /**
     * @param string $noteString
     * @param string $language
     *
     * @return array<string, mixed>
     */
    public function getMelodies(string $noteString, string $language): array
    {
        $permutations = MelodyPermutationGenerator::generate($noteString . self::ECHO_NOTE);

        return $this->db
            ->table('weapon_melody_notes AS wmn')
            ->select([
                'wmn.notes',
                'wmt.name',
                'wmt.effect1',
                'wmt.effect2',
                'wm.base_duration',
                'wm.base_extension',
                'wm.m1_duration',
                'wm.m1_extension',
                'wm.m2_duration',
                'wm.m2_extension',
            ])
            ->join('weapon_melody AS wm', 'wm.id', '=', 'wmn.id')
            ->join('weapon_melody_text AS wmt', static function ($join) use ($language): void {
                $join->on('wmt.id', '=', 'wm.id')
                    ->where('wmt.lang_id', $language);
            })
            ->whereIn('wmn.notes', $permutations)
            ->get()
            ->toArray();
    }
}

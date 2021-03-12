<?php

namespace App\Sources;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Connection as DB;
use stdClass;

class MonsterSource
{
    private DB $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db->connection();
    }

    /**
     * @param string $language
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->db->select('
            SELECT m.id,
                    mt.name,
                    m.size,
                    mt.ecology
            FROM monster m
                JOIN monster_text mt on mt.id = m.id
            WHERE mt.lang_id = :language
        ',
            [
                'language' => $language,
            ]
        );
    }

    /**
     * @param int $id
     * @param string $language
     * @return stdClass
     */
    public function getDetails(int $id, string $language): stdClass
    {
        return $this->db->selectOne('
            SELECT m.id,
                   mt.name,
                   m.size,
                   mt.description,
                   mt.ecology,
                   i.icon_color AS colour,
                   m.pitfall_trap,
                   m.shock_trap,
                   m.vine_trap,
                   ailment_roar,
                   m.ailment_wind,
                   m.ailment_tremor,
                   m.ailment_defensedown,
                   m.ailment_fireblight,
                   m.ailment_waterblight,
                   m.ailment_thunderblight,
                   m.ailment_iceblight,
                   m.ailment_dragonblight,
                   m.ailment_blastblight,
                   m.ailment_regional,
                   m.ailment_poison,
                   m.ailment_sleep,
                   m.ailment_paralysis,
                   m.ailment_bleed,
                   m.ailment_stun,
                   m.ailment_mud,
                   m.ailment_effluvia,
                   m.weakness_fire,
                   m.weakness_water,
                   m.weakness_ice,
                   m.weakness_thunder,
                   m.weakness_dragon,
                   m.weakness_poison,
                   m.weakness_sleep,
                   m.weakness_paralysis,
                   m.weakness_blast,
                   m.weakness_stun
            FROM monster m
                     JOIN monster_text mt ON mt.id = m.id
                     JOIN monster_reward mr ON mr.monster_id = m.id
                     LEFT JOIN item i ON i.id = mr.item_id
            WHERE mt.lang_id = :language
            AND mt.id = :id
            GROUP BY mt.id
        ',
            [
                'id' => $id,
                'language' => $language
            ]
        );
    }

    /**
     * @param int $id
     * @param string $language
     * @return stdClass[]
     */
    public function getHabitats(int $id, string $language): array
    {
        return $this->db->select("
            SELECT lt.name,
                   mh.start_area,
                   mh.move_area,
                   mh.rest_area
            FROM monster_text mt
                    JOIN monster_habitat mh ON mh.monster_id = mt.id
                    JOIN location_text lt ON lt.id = mh.location_id
            WHERE mt.lang_id = :language
                    AND lt.lang_id = :language
                    AND mt.id = :id
        ",
            [
                'id' => $id,
                'language' => $language
            ]
        );
    }

    /**
     * @param int $id
     * @param string $language
     * @return stdClass[]
     */
    public function getRewards(int $id, string $language): array
    {
        return $this->db->select("
            SELECT i.id,
                   it.name,
                   mr.rank,
                   mr.percentage,
                   mrct.name AS condition,
                   mr.stack,
                   i.icon_name,
                   i.icon_color
            FROM monster_text mt
                     JOIN monster_reward mr ON mr.monster_id = mt.id
                     JOIN monster_reward_condition_text mrct ON mrct.id = mr.condition_id
                     JOIN item i ON i.id = mr.item_id
                     JOIn item_text it ON it.id = i.id
            WHERE mt.lang_id = :language
              AND mrct.lang_id = :language
              AND it.lang_id = :language
              AND mt.id = :id;
        ",
            [
                'id' => $id,
                'language' => $language
            ]
        );
    }

    /**
     * @param int $id
     * @param string $language
     * @return stdClass[]
     */
    public function getBreaks(int $id, string $language): array
    {
        return $this->db->select("
            SELECT mbt.part_name AS name,
                   mb.flinch,
                   mb.wound,
                   mb.sever,
                   mb.extract
            FROM monster_text mt
                     JOIN monster_break mb ON mb.monster_id = mt.id
                     JOIN monster_break_text mbt ON mbt.id = mb.id
            WHERE mt.lang_id = :language
              AND mbt.lang_id = :language
              AND mt.id = :id
        ",
            [
                'id' => $id,
                'language' => $language
            ]
        );
    }

    /**
     * @param int $id
     * @param string $language
     * @return stdClass[]
     */
    public function getHitZones(int $id, string $language): array
    {
        return $this->db->select("
            SELECT mht.name,
                   mh.cut,
                   mh.impact,
                   mh.shot,
                   mh.fire,
                   mh.water,
                   mh.ice,
                   mh.thunder,
                   mh.dragon,
                   mh.ko
            FROM monster_text mt
                     JOIN monster_hitzone mh ON mh.monster_id = mt.id
                     JOIN monster_hitzone_text mht ON mht.id = mh.id
            WHERE mt.lang_id = :language
              AND mht.lang_id = :language
              AND mt.id = :id
        ",
            [
                'id' => $id,
                'language' => $language
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Sources;

use Illuminate\Database\Connection as DB;
use Illuminate\Database\DatabaseManager;
use stdClass;

class ItemSource
{
    private DB $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db->connection();
    }

    /**
     * @param string $language
     *
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->db->select(
            '
            SELECT i.id,
                   it.name,
                   i.category
            FROM item i
                JOIN item_text it ON it.id = i.id AND it.lang_id = :language
            ',
            ['language' => $language]
        );
    }

    public function getDetails(int $id, string $language): stdClass
    {
        return $this->db->selectOne(
            '
            SELECT i.id,
                   it.name,
                   i.icon_name,
                   i.icon_color,
                   i.category,
                   i.subcategory,
                   i.rarity,
                   i.buy_price,
                   i.sell_price,
                   i.carry_limit,
                   i.points
            FROM item i
                     JOIN item_text it ON it.id = i.id AND it.lang_id = :language
            WHERE it.id = :id
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
     * @return array<string, mixed>
     */
    public function getRecipes(int $id, string $language): array
    {
        return $this->db->select(
            '
            SELECT it.name       AS result,
                   first_t.id    AS first_ingredient_id,
                   first_t.name  AS first_ingredient,
                   second_t.id   AS second_ingredient_id,
                   second_t.name AS second_ingredient
            FROM item_text it
                     JOIN item_combination ic ON ic.result_id = it.id
                     JOIN item first ON first.id = ic.first_id
                     JOIN item_text first_t ON first_t.id = first.id AND first_t.lang_id = :language
                     LEFT JOIN item second ON second.id = ic.second_id
                     LEFT JOIN item_text second_t ON second_t.id = second.id AND second_t.lang_id = :language
            WHERE it.lang_id = :language
              AND ic.result_id = :id
            ',
            [
                'id' => $id,
                'language' => $language,
            ]
        );
    }
}

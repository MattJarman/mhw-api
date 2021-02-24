<?php

namespace App\Sources;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Connection as DB;

class MonsterSource
{
    private DB $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db->connection();
    }

    /**
     * @param string $language
     * @return array<string, mixed>[]
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
}

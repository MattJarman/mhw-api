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
            'SELECT i.id,
                   it.name,
                   i.category
            FROM item i
                JOIN item_text it ON it.id = i.id AND it.lang_id = :language
        ',
            ['language' => $language]
        );
    }
}

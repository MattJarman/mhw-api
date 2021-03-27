<?php

declare(strict_types=1);

namespace App\Sources;

use Illuminate\Database\Connection as DB;
use Illuminate\Database\DatabaseManager;

abstract class BaseSource
{
    protected DB $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db->connection();
    }
}

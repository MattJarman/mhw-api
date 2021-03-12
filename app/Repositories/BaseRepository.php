<?php

declare(strict_types=1);

namespace App\Repositories;

use stdClass;

interface BaseRepository
{
    /**
     * @return stdClass[]
     */
    public function index(string $language): array;

    /**
     * @return array<string, mixed>
     */
    public function show(int $id, string $language): array;
}

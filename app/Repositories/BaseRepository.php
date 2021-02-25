<?php

namespace App\Repositories;

use stdClass;

interface BaseRepository
{
    /**
     * @param string $language
     * @return stdClass[]
     */
    public function index(string $language): array;

    /**
     * @param int $id
     * @param string $language
     *
     * @return array<string, mixed>
     */
    public function show(int $id, string $language): array;
}

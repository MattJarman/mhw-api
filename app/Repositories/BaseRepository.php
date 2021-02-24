<?php

namespace App\Repositories;

interface BaseRepository
{
    /**
     * @param string $language
     * @return array<string, mixed>[]
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

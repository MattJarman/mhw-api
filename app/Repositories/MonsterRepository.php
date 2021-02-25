<?php


namespace App\Repositories;

use App\Sources\MonsterSource;

class MonsterRepository implements BaseRepository
{
    private MonsterSource $src;

    public function __construct(MonsterSource $src)
    {
        $this->src = $src;
    }

    public function index(string $language): array
    {
        return $this->src->index($language);
    }

    public function show(int $id, string $language): array
    {
        return [];
    }
}

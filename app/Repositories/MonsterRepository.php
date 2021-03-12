<?php


namespace App\Repositories;

use App\Sources\MonsterSource;
use JetBrains\PhpStorm\ArrayShape;

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

    #[ArrayShape([
        'details' => "stdClass",
        'habitats' => "array",
        'rewards' => "array",
        'breaks' => "array",
        'hitZones' => "array"
    ])]
    public function show(int $id, string $language): array
    {
        return [
            'details' => $this->src->getDetails($id, $language),
            'habitats' => $this->src->getHabitats($id, $language),
            'rewards' => $this->src->getRewards($id, $language),
            'breaks' => $this->src->getBreaks($id, $language),
            'hitZones' => $this->src->getHitZones($id, $language),
        ];
    }
}

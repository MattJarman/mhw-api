<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Sources\MonsterSource;
use stdClass;

class MonsterRepository implements BaseRepository
{
    private MonsterSource $src;

    public function __construct(MonsterSource $src)
    {
        $this->src = $src;
    }

    /**
     * @param string $language Language to get results for
     *
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->src->index($language);
    }

    /**
     * @param int    $id       Id of monster
     * @param string $language Language to get results for
     *
     * @return array<string, mixed>
     */
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

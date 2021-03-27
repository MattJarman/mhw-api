<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Sources\WeaponSource;
use stdClass;

class WeaponRepository implements BaseRepository
{
    private WeaponSource $src;

    public function __construct(WeaponSource $src)
    {
        $this->src = $src;
    }

    /**
     * @param string $language
     *
     * @return stdClass[]
     */
    public function index(string $language): array
    {
        return $this->src->index($language);
    }

    /**
     * @param int    $id
     * @param string $language
     *
     * @return array<string, mixed>
     */
    public function show(int $id, string $language): array
    {
        return [];
    }
}

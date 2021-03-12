<?php

declare(strict_types=1);

namespace App\Mappers\Monster;

use App\Mappers\BaseIndexMapper;
use stdClass;

use function route;

class MonsterIndexMapper implements BaseIndexMapper
{
    /** @var array<string, mixed>[] */
    private array $monsters;

    /**
     * @param stdClass[] $monsters
     */
    public function __construct(array $monsters)
    {
        $this->monsters = $this->map($monsters);
    }

    /**
     * @return array<string, mixed>[]
     */
    public function get(): array
    {
        return $this->monsters;
    }

    /**
     * @param stdClass[] $monsters
     *
     * @return array<string, mixed>[]
     */
    private function map(array $monsters): array
    {
        $result = [];
        foreach ($monsters as $monster) {
            $result[] = [
                'id' => (int) $monster->id,
                'name' => $monster->name,
                'size' => $monster->size,
                'species' => $monster->ecology,
                'url' => route('monster.show', $monster->id),
            ];
        }

        return $result;
    }
}

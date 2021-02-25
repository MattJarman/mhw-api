<?php

namespace App\Mappers\Monster;

use App\Mappers\BaseIndexMapper;
use stdClass;

class MonsterIndexMapper implements BaseIndexMapper
{
    /** @var array<string, mixed>[] */
    private array $monsters;

    /**
     * MonsterIndexMapper constructor.
     * @param stdClass[] $monsters
     */
    public function __construct(array $monsters)
    {
        $this->monsters = $this->map($monsters);
    }

    public function get(): array
    {
        return $this->monsters;
    }

    /**
     * @param stdClass[] $monsters
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
                'url' => route('monster.show', $monster->id)
            ];
        }

        return $result;
    }
}

<?php

declare(strict_types=1);

namespace App\Mappers\Item;

use App\Mappers\BaseIndexMapper;
use stdClass;

class ItemIndexMapper implements BaseIndexMapper
{
    /** @var array<string, mixed>[] */
    private array $items;

    /**
     * @param stdClass[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $this->map($items);
    }

    /**
     * @return array<string, mixed>[]
     */
    public function get(): array
    {
        return $this->items;
    }

    /**
     * @param stdClass[] $items
     *
     * @return array<string, mixed>[]
     */
    private function map(array $items): array
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = [
                'id' => (int) $item->id,
                'name' => $item->name,
                'category' => $item->category,
                'url' => route('item.show', $item->id),
            ];
        }

        return $result;
    }
}

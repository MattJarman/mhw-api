<?php

declare(strict_types=1);

namespace App\Mappers\Item;

class ItemShowMapper
{
    private ItemShowFieldMapper $fieldMapper;

    /** @var array<string, mixed> $item */
    private array $item;

    /**
     * @param array<string, mixed> $item
     */
    public function __construct(array $item)
    {
        $this->fieldMapper = new ItemShowFieldMapper($item);
        $this->item = $this->map();
    }

    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return $this->item;
    }

    /**
     * @return array<string, mixed>
     */
    private function map(): array
    {
        return [
            'name' => $this->fieldMapper->getName(),
            'icon' => $this->fieldMapper->getIconUrl(),
            'category' => $this->fieldMapper->getCategory(),
            'sub_category' => $this->fieldMapper->getSubCategory(),
            'rarity' => $this->fieldMapper->getRarity(),
            'prices' => $this->fieldMapper->getPrices(),
            'carry_limit' => $this->fieldMapper->getCarryLimit(),
            'research_points' => $this->fieldMapper->getResearchPoints(),
            'recipes' => $this->fieldMapper->getRecipes(),
        ];
    }
}

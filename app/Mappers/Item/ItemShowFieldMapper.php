<?php

declare(strict_types=1);

namespace App\Mappers\Item;

use App\Mappers\BaseMapper;
use stdClass;

class ItemShowFieldMapper extends BaseMapper
{
    private stdClass $details;
    private ?string $iconUrl;

    /** @var array<string, int> */
    private array $prices;

    /** @var array<int, array<string, array<string, mixed>|null>> */
    private array $recipes;

    /**
     * @param array<string, mixed> $item
     */
    public function __construct(array $item)
    {
        $this->details = $item['details'];
        $this->iconUrl = $this->mapIconUrl($this->details);
        $this->prices = $this->mapPrices((int) $this->details->buy_price, (int) $this->details->sell_price);
        $this->recipes = $this->mapRecipes($item['recipes']);
    }

    public function getName(): string
    {
        return $this->details->name;
    }

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function getCategory(): string
    {
        return $this->details->category;
    }

    public function getSubCategory(): ?string
    {
        return $this->details->subcategory;
    }

    public function getRarity(): int
    {
        return (int) $this->details->rarity;
    }

    /**
     * @return array<string, int>
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    public function getCarryLimit(): int
    {
        return (int) $this->details->carry_limit;
    }

    public function getResearchPoints(): int
    {
        return (int) $this->details->points;
    }

    /**
     * @return array<int, array<string, array<string, mixed>|null>>
     */
    public function getRecipes(): array
    {
        return $this->recipes;
    }

    private function mapIconUrl(stdClass $details): ?string
    {
        return $details->icon_name
            ? $this->getItemIconUrl($details->icon_name, $details->icon_color)
            : null;
    }

    /**
     * @param int $buy
     * @param int $sell
     *
     * @return array<string, int>
     */
    private function mapPrices(int $buy, int $sell): array
    {
        return [
            'buy' => $buy,
            'sell' => $sell,
        ];
    }

    /**
     * @param stdClass[] $recipes
     *
     * @return array<int, array<string, array<string, mixed>|null>>
     */
    private function mapRecipes(array $recipes): array
    {
        $mappedRecipes = [];
        foreach ($recipes as $recipe) {
            $mappedRecipes[] = [
                'first_ingredient' => [
                    'name' => $recipe->first_ingredient,
                    'url' => route('item.show', $recipe->first_ingredient_id),
                ],
                'second_ingredient' => $recipe->second_ingredient
                    ? ['name' => $recipe->second_ingredient, 'url' => route('item.show', $recipe->second_ingredient_id)]
                    : null,
            ];
        }

        return $mappedRecipes;
    }
}

<?php

declare(strict_types=1);

namespace App\Mappers;

interface BaseIndexMapper
{
    /**
     * @return array<string, mixed>[]
     */
    public function get(): array;
}

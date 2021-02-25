<?php

namespace App\Mappers;

interface BaseIndexMapper
{
    /**
     * @return array<string, mixed>[]
     */
    public function get(): array;
}

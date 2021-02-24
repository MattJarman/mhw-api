<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Validation\Rules\In;

class EquipmentShowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['rarity' => In::class])]
    public function rules(): array
    {
        return [
            'rarity' => Rule::in(config('image.rarities')),
        ];
    }
}

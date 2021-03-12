<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class MonsterShowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    #[ArrayShape(['monster' => "string"])]
    public function rules(): array
    {
        return [
            'monster' => 'exists:monster,id'
        ];
    }

    /**
     * @param null $keys
     * @return mixed[]
     */
    public function all($keys = null): array
    {
        $request = parent::all();
        $request['monster'] = $this->route('monster');
        return $request;
}
}

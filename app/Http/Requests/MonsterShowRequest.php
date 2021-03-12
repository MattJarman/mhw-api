<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonsterShowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return ['monster' => 'exists:monster,id'];
    }

    /**
     * @param array<string, string>|mixed|null $keys
     *
     * @return mixed[]
     */
    public function all($keys = null): array
    {
        $request = parent::all();
        $request['monster'] = $this->route('monster');

        return $request;
    }
}

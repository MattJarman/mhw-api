<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeaponShowRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return ['weapon' => 'exists:weapon,id'];
    }

    /**
     * @param array<string, string>|mixed|null $keys
     *
     * @return mixed[]
     */
    public function all($keys = null): array
    {
        $request = parent::all();
        $request['weapon'] = $this->route('weapon');

        return $request;
    }
}

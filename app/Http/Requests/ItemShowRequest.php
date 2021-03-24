<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemShowRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return ['item' => 'exists:item,id'];
    }

    /**
     * @param array<string, string>|mixed|null $keys
     *
     * @return mixed[]
     */
    public function all($keys = null): array
    {
        $request = parent::all();
        $request['item'] = $this->route('item');

        return $request;
    }
}

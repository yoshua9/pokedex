<?php

namespace App\Infrastructure\Http\Request\Pokemon;

use Illuminate\Foundation\Http\FormRequest;

class CreatePokemonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'hp' => 'required|integer|min:1|max:100',
            'status' => 'required|in:wild,captured',
        ];
    }
}

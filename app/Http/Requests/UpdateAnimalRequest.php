<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name' => 'required|max:255',
             'species' => 'required|max:255',
             'age' => 'required|integer|min:0|max:30',
             'gender' =>'required|in:male,female',
             'weight' => 'required|numeric|min:0.1|max:100',
        ];
    }
}

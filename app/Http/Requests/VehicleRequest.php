<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => ['required'],
            'model' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'plate' => [
                'required',
                'regex:/^[a-zA-Z]{3}-[0-9]{4}$/',
                Rule::unique('vehicles')->ignore($this->id)
            ],
            "model" => ['string'],
            "brand" => ['string'],
            'year' => [
                'numeric',
                'regex:/^\d{4}$/',
                function ($attribute, $value, $fail) {
                    $currentYear = date('Y');
                    if (!($value >= 1900 && $value <= $currentYear)) {
                        $fail('O ano deve ser um valor válido e menor ou igual ao ano atual.');
                    }
                }
            ],
            "description" => ['string'],
            'rental_cost' => ['numeric', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'plate.regex' => 'A placa do veículo deve estar no formato AAA-9999.',
            'plate.unique' => 'Essa placa já está cadastrada.'
        ];
    }
}

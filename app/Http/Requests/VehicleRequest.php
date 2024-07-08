<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => ['required', 'exists:vehicle_categories,name'],
            'photo' => ['file'],
            'model' => ['string'],
            'brand' => ['string'],
            'plate' => ['regex:/^[A-Z]{3}[0-9]{4}$/'],
            "model" => ['string'],
            "brand" => ['string'],
            'year' => ['numeric', 'regex:/^\d{4}$/'],
            "description" => ['string'],
            'rental_cost' => ['numeric', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'plate.regex' => 'A placa do veículo deve estar no formato AAA0000.',
        ];
    }
}

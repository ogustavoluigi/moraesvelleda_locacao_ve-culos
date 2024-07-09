<?php

namespace App\Http\Requests;

class UpdateVehicleRequest extends VehicleRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        $rules['photo'] = ['nullable'];

        return $rules;
    }
}

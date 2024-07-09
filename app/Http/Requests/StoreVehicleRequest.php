<?php

namespace App\Http\Requests;

class StoreVehicleRequest extends VehicleRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        $rules['photo'] = ['nullable', 'image'];

        return $rules;
    }
}

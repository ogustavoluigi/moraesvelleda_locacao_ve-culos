<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RentalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'start_date' => ['required', 'date', 'after_or_equal:' . Carbon::now()->toDateTimeString()],
            'end_date' => ['required', 'date', 'after_or_equal:' . Carbon::now()->toDateTimeString()],
        ];
    }

    public function messages()
    {
        return [
            'start_date.after_or_equal' => 'A data e hora de retirada não podem ser anteriores a agora.',
            'end_date.after_or_equal' => 'A data e hora de devolução não podem ser anteriores a agora.',
        ];
    }
}

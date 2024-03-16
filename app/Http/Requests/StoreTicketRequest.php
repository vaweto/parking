<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => ['required', 'integer', 'exists:vehicles,id,user_id,'. auth()->id()],
            'parking_zone_id' => ['required', 'integer', 'exists:parking_zones,id'],
            'expires_at' => ['date','after:now']
        ];
    }
}

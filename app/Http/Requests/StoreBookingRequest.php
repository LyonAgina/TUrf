<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            // Crucial: This matches $data['turfID'] in your controller
            'turfID' => 'required|integer|exists:turfs,turfID',

            // These are used in $booking->guestInfo
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'payment_info' => 'required|string',

            // These are optional in your controller logic
            'slot_id' => 'nullable|integer',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after:start_time',
        ];
    }
}
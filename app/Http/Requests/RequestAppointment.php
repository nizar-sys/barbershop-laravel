<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAppointment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|',
            'appointment_date' => 'required|date',
            'status' => 'nullable',
            'barber_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
        ];
    }
}

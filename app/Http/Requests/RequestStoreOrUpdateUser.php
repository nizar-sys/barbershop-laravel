<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateUser extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->barber ?? ''),
            'role' => 'nullable',
            'phone_number' => 'required|unique:users,phone_number,' . ($this->barber ?? ''),
            'shift_start' => 'required|after_or_equal:08:00',
            'shift_end' => 'required|after:shift_start',
        ];

        $postRules = [
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $rules = array_merge($rules, $this->isMethod('POST') ? $postRules : []);

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role.required' => 'Kolom role harus diisi.',
            'role.in' => 'Role tidak valid.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Format gambar tidak valid.',
            'avatar.max' => 'Gambar tidak boleh lebih dari 2MB.',
            'confirmation_password.required' => 'Kolom konfirmasi password harus diisi.',
            'confirmation_password.same' => 'Konfirmasi password tidak sama.',
            'phone_number.required' => 'Kolom nomor telepon harus diisi.',
            'phone_number.unique' => 'Nomor telepon sudah digunakan.',
            'shift_start.required' => 'Kolom jam mulai shift harus diisi.',
            'shift_start.after_or_equal' => 'Jam mulai shift harus setelah atau sama dengan jam 08:00.',
            'shift_end.required' => 'Kolom jam selesai shift harus diisi.',
            'shift_end.after' => 'Jam selesai shift harus setelah jam mulai shift.',
        ];
    }
}

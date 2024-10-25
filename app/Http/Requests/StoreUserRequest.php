<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255','unique:users'],
            'password' => ['required','confirmed','min:6'],
            'phone' => ['required','unique:users','min:8','max:13','regex:/^([0-9\s\-\+\(\)]*)$/'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The car name is required.',
            'email.required' => 'The car model is required.',
            'password.required' => 'The price is required.',
            'phone.required' => 'The price is required.',
            'phone.unique' => 'The phone number is already used.',
        ];
    }
}

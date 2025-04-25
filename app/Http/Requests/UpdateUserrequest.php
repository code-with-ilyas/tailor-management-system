<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserrequest extends FormRequest
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
           
            'name' => ['required','regex:/^[a-zA-Z\s]+$/'],
            'email'=>['required','max:50'],
            'password'=>['required','string','max:300'],
            'phone'=>['required'],
            'address'=>['required'],
            'city'=>['required'],
            'type'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required'=>'The email field is required.',
            'password.required'=>'The password field is required.',
            'phone.required'=>'The phone field is required.',
            'address.required'=>'The address field is required.',
            'city.required'=>'The city field is required.',
            'type.required'=>'The type field is required.',


             ];
             
             
    }
}

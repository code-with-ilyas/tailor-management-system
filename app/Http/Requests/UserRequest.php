<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function messages(): array
    {
        return [
        
            'name.required' => 'Fill the Name field',
            'email.required'=>'Fill the Email field.',
            'password.required'=>'Fill the Password field',
            'phone.required'=>'Fill the Phone field.',
            'address.required'=>'Fill the Address field',
            'city.required'=>'Fill the City field',
            'type.required'=>'Fill the Type field',
        ];
    }
}

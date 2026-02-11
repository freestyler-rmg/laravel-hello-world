<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|alpha_num|max:20|unique:users,name',
      'email' => 'required|email|unique:users,email',
      'password' => ['required', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',  'min:8'],
      'password_confirmation' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'name.unique' => 'Sorry, that name or email is already taken.',
      'email.unique' => 'Sorry, that name or email is already taken.',
      'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
    ];
  }
}

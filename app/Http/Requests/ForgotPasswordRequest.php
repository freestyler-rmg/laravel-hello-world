<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => 'required|email',
      'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', 'confirmed'],
      'password_confirmation' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
    ];
  }
}

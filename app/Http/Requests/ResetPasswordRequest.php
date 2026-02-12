<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'old_password' => ['required'],
      'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', 'confirmed'],
      'password_confirmation' => ['required']
    ];
  }

  public function messages(): array
  {
    return [
      'old_password.required' => 'Old password is required.',
      'password.required' => 'New password is required.',
      'password.min' => 'New password must be at least 8 characters long.',
      'password.regex' => 'New password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
      'password_confirmation.required' => 'New password confirmation is required.',
    ];
  }
}

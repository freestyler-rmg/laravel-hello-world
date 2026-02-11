<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|string|max:10',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'This can\'t be empty.',
      'name.max' => ':attribute is too much.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'custom item name',
    ];
  }
}

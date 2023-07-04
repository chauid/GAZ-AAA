<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** 사용자 회원가입 데이터 요청 */
class RegisterPostRequest extends FormRequest
{
  /**
   * Indicates if the validator should stop on the first rule failure.
   *
   * @var bool
   */
  protected $stopOnFirstFailure = true;
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'id' => 'required|string|max:15',
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'id.required' => 'A title is required',
      'id.max' => 'A title is required',
    ];
  }
}
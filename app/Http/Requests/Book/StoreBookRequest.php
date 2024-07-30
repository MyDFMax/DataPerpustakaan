<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    // update this to the actual authorization checks
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'nama_buku' => ['required', 'string', 'max:255'],
      'penerbit' => ['required', 'string', 'max:255'],
    ];
  }

  /**
   * Custom message for validation errors.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'nama_buku.required' => 'book name is required',
      'penerbit.required' => 'Publisher name is required',
    ];
  }
}
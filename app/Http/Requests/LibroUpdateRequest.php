<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => ['required','digits:10'],
            'portada' => ['nullable','image','mimes:png,jpg,jpeg'],
            'titulo' => ['required','string','max:60'],
            'autor' => ['required','string','max:60'],
            'editorial' => ['required','string','max:60'],
        ];
    }

    public function messages():array{
        return [
            'portada.required' => 'Debes seleccionar una imagen',
        ];
    }
}

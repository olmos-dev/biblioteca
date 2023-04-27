<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoUpdateRequest extends FormRequest
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
            'libro' => ['required','exists:libro,id'],
            'estudiante' => ['required','exists:estudiante,id'],
            'estado' => ['required','exists:estado,valor']

        ];
    }
}

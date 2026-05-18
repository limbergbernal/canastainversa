<?php

namespace App\Http\Requests\distrito;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DistritoRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'distrito' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'estado' => ['required', Rule::in(['HABILITADO','NO HABILITADO'])]
        ];
    }
}

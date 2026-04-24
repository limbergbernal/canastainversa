<?php

namespace App\Http\Requests\barrio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BarrioRequest extends FormRequest
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
            'tipo' => ['required', 'string', Rule::in(['BARRIO','COMUNIDAD'])],
            'nombre' => ['required','string', Rule::unique('barrios')->ignore($id)],
            'distrito_id' => ['required', 'exists:distritos,id'],
            'estado' => ['required', Rule::in(['HABILITADO', 'NO HABILITADO'])]
        ];
    }
}

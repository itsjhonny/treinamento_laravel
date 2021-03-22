<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'nome_equipamento' => 'required|min:3'            
        ];
    }

    public function messages() {
        return [
            'nome_equipamento.required' => 'O preenchimento do campo Nome Equipamento é obrigatório',
            'nome_equipamento.min'    => 'O campo Nome Equipamento deve ter no mínimo 3 letras',
            
        ];
    }
}
<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ClientSaveRequest extends ApiRequest
{
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'cpf' => 'required|formato_cpf|cpf',
            'birth_date' => 'required|date_format:Y-m-d',
            'phone' => 'sometimes|celular_com_ddd'
        ];
    }
}

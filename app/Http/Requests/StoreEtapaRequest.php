<?php

namespace App\Http\Requests;

use App\Models\Etapa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEtapaRequest extends FormRequest
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
        return [
            'frete_id' => ['required', 'integer', 'exists:fretes,id'],
            'descricao' => ['required', 'string'],
            'tipo_etapa' => ['required', Rule::in(['EM_TRANSITO', 'SAIU_ENTREGA', 'ENTREGUE'])],
        ];
    }
}

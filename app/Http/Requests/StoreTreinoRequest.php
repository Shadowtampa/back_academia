<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreinoRequest extends FormRequest
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
            'title' => 'required',
            'dayOfTheWeek' => 'required|in:segunda,terça,quarta,quinta,sexta,sábado,domingo',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'dayOfTheWeek.required' => 'O campo dia da semana é obrigatório.',
            'dayOfTheWeek.in' => 'O valor do campo dia da semana deve ser uma das opções permitidas: segunda,terça,quarta,quinta,sexta,sábado ou domingo.',
        ];
    }
}

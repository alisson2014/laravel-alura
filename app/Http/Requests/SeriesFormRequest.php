<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'cover_path' => ['max:10000', 'mimes:png,jpg,jpeg']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome nome é obrigatório',
            'name.min' => 'O campo nome precisa de pelo menos :min caracteres',
            'cover_path.max' => 'A imagem tem que ter 10000kb ou menos',
            'cover_path.mimes' => 'A imagem precisa ser do tipo jpg, jpeg ou png'
        ];
    }
}

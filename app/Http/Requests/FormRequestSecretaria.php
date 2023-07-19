<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests; 
use Illuminate\Validation\Validator;
class FormRequestSecretaria extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sigla' => 'required|unique:secretarias',
        ];
        // return Validator::make([
        //     'sigla' => 'required|unique',            
        // ]);
    }
}

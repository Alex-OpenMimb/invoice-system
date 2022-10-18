<?php

namespace App\Http\Requests;

use App\Traits\ApiResponser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    use ApiResponser;
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {

            case 'POST':
                return [
                    'number'       =>  'bail|required|numeric|',
                    'number_order' =>  'bail|required|numeric|',
                ];
                break;
        }
    }

    
    public function messages(){
        return  [
            'number.numeric'          => 'Este campo debe ser un número',
            'number_order.numeric'    => 'Este campo debe ser un número',
          
        ];
    }

    public function failedValidation(ValidationValidator $validator) {
        $message = $validator->errors()->first();
        throw new HttpResponseException($this->showMessage($message, 500, false));
    } 
}

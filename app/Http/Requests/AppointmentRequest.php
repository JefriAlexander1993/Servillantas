<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            
            'Placa'=>'required',
            'Titulo' => 'required',
            'color' => 'required',
            'Fecha_de_cita'  => 'required',
            'Hora' =>  'required',   
        ];
    }
}

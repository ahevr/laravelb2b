<?php

namespace App\Http\Requests\Bayi;

use Illuminate\Foundation\Http\FormRequest;

class CariSetRequest extends FormRequest
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

            "fis_no"=> "required",
            "desc"=> "required",
            "vade_tarihi"=> "required",
            "borc_tutari"=> "required",
            "alacak_tutari"=> "required",
            "borc_bakiye"=> "required",
            "alacak_bakiye"=> "required",

        ];
    }
}

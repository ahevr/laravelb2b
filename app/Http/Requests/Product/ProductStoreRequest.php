<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "product_name"=> "required|min:2|max:80",
            "product_code"=> "required",
            "product_desc"=> "required",
            "stock_status"=> "required",
            "stock_quantity"=> "required",
            "price"=> "required",
            "discount"=> "required",
            "tax"=> "required",
            "usage_area"=> "required",
            "kol_sayisi"=> "required",
            "material"=> "required",
            "width"=> "required",
            "height"=> "required",
            "length"=> "required",
            "kg"=> "required",
            "warranty_period"=> "required",
            "brand"=> "required",
            "color"=> "required",
            "bulb"=> "required",
            "category_id"=> "required",
            "duy"=> "required"
        ];
    }
}

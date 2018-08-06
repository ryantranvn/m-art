<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|max:255',
                    //'slug' => 'required|max:255', //|unique:products
                    'supplier_id' => 'required',
                    'category_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                //$id = $this->product;
                return [
                    'name' => 'required|max:255',
                    //'slug' => 'required|max:255', //|unique:products,name,'.$id.',supplier_id
                    'supplier_id' => 'required',
                    'category_id' => 'required'
                ];
            }
            default:break;
        }
    }
}

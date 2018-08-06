<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
                    'name' => 'required|max:255|unique:suppliers',
                    'province_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->supplier;
                return [
                    'name' => 'required|max:255|unique:suppliers,name,'.$id.',supplier_id',
                    'province_id' => 'required'
                ];
            }
            default:break;
        }
    }
}

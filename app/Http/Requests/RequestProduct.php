<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'p_name' => 'required|unique:products,p_name,'.$this->id,
            'p_category_id' => 'required',
            'p_price' => 'required',
            'p_sale' => 'required',
            'p_description' => 'required',
            'p_content' => 'required',
            'p_number' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'p_name.required' => 'Tên sản phẩm không được để trống',
            'p_name.unique' => 'Tên sản phẩm đã tồn tại',
            'p_category_id.required' => 'Danh mục không được để trống',
            'p_price.required' => 'Giá không được để trống',
            'p_sale.required' => 'Khuyến mãi không được để trống',
            'p_description.required' => 'Mô tả không được để trống',
            'p_content.required' => 'Nội dung không được để trống',
            'p_number.required' => 'Số lượng không được để trống'
        ];
    }
}

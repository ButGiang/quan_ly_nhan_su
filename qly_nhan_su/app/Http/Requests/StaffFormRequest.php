<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
            'first_name'=> 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'CCCD' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages(): array {
        return [
            'first_name.required' => 'Vui lòng nhập đẩy đủ họ và tên đệm',
            'last_name.required' => 'Vui lòng nhập tên',
            'birthday.required' => 'Vui lòng nhập ngày sinh',
            'CCCD.required' => 'Vui lòng nhập CCCD',
            'email.required' => 'Vui lòng nhập email',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
        ];
    }
}

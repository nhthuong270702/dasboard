<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages() {
        return [
            'required' => ':attribute không được bỏ trống',
            'password_confirmation.same' => 'Mật khẩu và xác nhận mật khẩu không trùng nhau',
            'min'  => 'Mật khẩu phải ít nhất 8 kí tự'
        ];
    }
}

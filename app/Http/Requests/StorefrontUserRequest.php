<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorefrontUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            //
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ' الاسم مطلوب.',
            'email.required' => ' البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
            'password.required' => ' كلمة المرور مطلوبة.',
            'password.min' => 'يجب أن تكون كلمة المرور على الأقل 8 أحرف.',
            'password_confirmation.required' => 'تأكيد كلمة المرور مطلوب.',
            'password_confirmation.same' => 'تأكيد كلمة المرور لا يتطابق.',
        ];
    }
}

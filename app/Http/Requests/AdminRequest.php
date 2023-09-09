<?php

namespace App\Http\Requests;

use App\Rules\HTMLTag;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'first_name'  => ['required', 'max:100', new HTMLTag],
            'last_name'   => ['required', 'max:100', new HTMLTag],
            'email'       => ['required', 'email', 'max:45', 'unique:accounts,email,' . $this->id]
        ];
    }

    public function attributes()
    {
        return [
            'first_name'    => 'First Name',
            'last_name'     => 'Last Name',
            'email'         => 'Email',
        ];
    }
}

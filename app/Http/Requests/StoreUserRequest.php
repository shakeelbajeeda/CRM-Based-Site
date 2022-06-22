<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'status' => 'required|boolean',
            'role' => 'required',Rule::in(["user", "admin"]),
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5020',
        ];
    }
}

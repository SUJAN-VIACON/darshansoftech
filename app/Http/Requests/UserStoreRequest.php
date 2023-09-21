<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => ["required", "string", "max:20"],
            "last_name" => ["required", "string", "max:20"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'digits:10'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    // only for api request

    protected function failedValidation(Validator $validator)
    {
        if (!Str::startsWith(request()->path(), 'api')) return;

        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}

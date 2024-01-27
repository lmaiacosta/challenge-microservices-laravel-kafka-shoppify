<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateTokenRequest
 * @package App\Http\Requests
 *
 * @property string $username
 * @property string $password
 */
class CreateTokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required','string'],
            'password' => ['required','string']
        ];
    }
}

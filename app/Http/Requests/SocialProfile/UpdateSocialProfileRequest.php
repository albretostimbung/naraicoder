<?php

namespace App\Http\Requests\SocialProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialProfileRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'url' => 'sometimes|url|max:255',
            'icon' => 'sometimes|image|mimes:jpeg,jpg,png,svg|max:2048',
        ];
    }
}

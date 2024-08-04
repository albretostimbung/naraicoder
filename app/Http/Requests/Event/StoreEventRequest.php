<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'description' => 'required|string|max:35553',
            'speaker' => 'required|string|max:255',
            'is_online' => 'nullable',
            'url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'image.*' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }
}

<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
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
            'name' => 'required|string',
            'type' => 'required|in:rumah,ruko',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked,unavailable',
            'address' => 'required|string',
            'city' => 'required|string',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'description' => 'required|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.in' => 'Tipe rumah hanya boleh rumah atau ruko',
            'status.in' => 'Status harus available, booked, atau unavailable',
            'images.*.image' => 'File harus berupa gambar',
            'images.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'images.*.max' => 'Ukuran gambar maksimal 10MB',
        ];
    }
} 
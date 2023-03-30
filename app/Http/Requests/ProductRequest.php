<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'require|string|max:150',
            'price' => 'require|integer',
            'sale' => 'require|integer',
            'quantity' => 'require',
            'description' => 'require|string|max:150',
            'image_id' => 'require|integer',
        ];
    }
}

<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    public function rules($id, $type, $newImage)
    {
        if ($type == 1) {
            return [
                'name'              => ['required', 'min:3', 'max:30', 'string', 'unique:products'],
                'short_description' => ['required', 'min:5', 'max:150'],
                'description'       => ['required', 'string'],
                'regular_price'     => ['required', 'numeric'],
                'sale_price'        => ['nullable', 'numeric'],
                'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
                'featured'          => ['required', 'boolean'],
                'quantity'          => ['required', 'integer'],
                'image'             => ['required', 'image'],
                'active'            => ['required', 'boolean'],
                'category_id'       => ['required', 'integer'],
            ];
        } elseif ($type == 2 && isset($newImage) && $newImage <> "") {
            return [
                'name'              => [
                    'required', 'min:3', 'max:30', 'string',
                    Rule::unique('products')->ignore($id)
                ],
                'slug'              => ['required', 'string'],
                'short_description' => ['required', 'min:5', 'max:150'],
                'description'       => ['required', 'string'],
                'regular_price'     => ['required', 'numeric'],
                'sale_price'        => ['nullable', 'numeric'],
                'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
                'featured'          => ['required', 'boolean'],
                'quantity'          => ['required', 'integer'],
                'active'            => ['required', 'boolean'],
                'category_id'       => ['required', 'integer'],
                'new_image' => ['required', 'image', 'max:2048'],
            ];
        } elseif ($type == 2) {
            return [
                'name'              => [
                    'required', 'min:3', 'max:30', 'string',
                    Rule::unique('products')->ignore($id)
                ],
                'slug'              => ['required', 'string'],
                'short_description' => ['required', 'min:5', 'max:150'],
                'description'       => ['required', 'string'],
                'regular_price'     => ['required', 'numeric'],
                'sale_price'        => ['nullable', 'numeric'],
                'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
                'featured'          => ['required', 'boolean'],
                'quantity'          => ['required', 'integer'],
                'active'            => ['required', 'boolean'],
                'category_id'       => ['required', 'integer'],
            ];
        }
    }
}

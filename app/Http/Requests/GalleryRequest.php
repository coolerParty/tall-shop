<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'name'        => ['required', 'min:3', 'max:30', 'string'],
                'featured'    => ['required', 'boolean'],
                'image'       => ['required', 'image'],
                'active'      => ['required', 'boolean'],
                'category_id' => ['required', 'integer'],
            ];
        } elseif ($type == 2 && isset($newImage) && $newImage <> "") {
            return [
                'name'        => ['required', 'min:3', 'max:30', 'string'],
                'featured'    => ['required', 'boolean'],
                'active'      => ['required', 'boolean'],
                'category_id' => ['required', 'integer'],
                'new_image'   => ['required', 'image', 'max:2048'],
            ];
        } elseif ($type == 2) {
            return [
                'name'        => ['required', 'min:3', 'max:30', 'string'],
                'featured'    => ['required', 'boolean'],
                'active'      => ['required', 'boolean'],
                'category_id' => ['required', 'integer'],
            ];
        }
    }
}

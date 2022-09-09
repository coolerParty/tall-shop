<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
    public function rules($id,$type)
    {
        if($type == 1){
            return [
                'name' => ['required', 'min:3', 'max:30', 'string', 'unique:categories'],
            ];
        }else if($type == 2){
            return [
                'name' => ['required', 'min:3', 'max:30', 'string', Rule::unique('categories')->ignore($id)],
            ];
        }

    }
}

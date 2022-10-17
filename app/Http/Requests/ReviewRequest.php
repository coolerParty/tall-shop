<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title'   => ['required', 'min:3', 'max:100', 'string'],
            'rating'  => ['required', 'min:1', 'max:5','numeric'],
            'comment' => ['required', 'string','max:600'],
        ];
    }
}

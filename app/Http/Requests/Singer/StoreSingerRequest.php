<?php

namespace App\Http\Requests\Singer;

use App\Http\Requests\BaseFormRequest;

class StoreSingerRequest extends BaseFormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:200|min:5',
            'position' => 'nullable|string|max:200|min:5',
            'description' => 'nullable|string|max:10000|min:5',
            'cover' => 'nullable|file|image|mimes:jpg,jpeg,png',
        ];
    }
}

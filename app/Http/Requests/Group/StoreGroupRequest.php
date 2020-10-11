<?php

namespace App\Http\Requests\Group;

use App\Http\Requests\BaseFormRequest;

class StoreGroupRequest extends BaseFormRequest
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
            'title' => 'required|string|max:200|min:5',
            'description' => 'nullable|string|max:10000|min:5',
            'cover' => 'nullable|file|image|mimes:jpg,jpeg,png',
        ];
    }
}


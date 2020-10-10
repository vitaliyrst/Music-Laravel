<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseFormRequest;

class StoreSongRequest extends BaseFormRequest
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
            'duration' => 'nullable|string|max:5|min:5',
            'song_number' => 'nullable|integer',
        ];
    }
}

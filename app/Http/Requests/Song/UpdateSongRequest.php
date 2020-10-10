<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseFormRequest;

class UpdateSongRequest extends BaseFormRequest
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
            'title' => 'nullable|string|max:200|min:5',
            'duration' => 'nullable|string|max:5|min:5',
            'song_number' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Название песни должно быть не меньше :min символов',
            'title.max' => 'Название песни должно быть не более :max символов',
            'title.required' => 'Название песни не может быть пустым',
            'title.string' => 'Название песни должно быть строкой',
            'duration.required' => 'Длительность песни обязательна',
            'duration.string' => 'Длительность песни должна быть строкой',
            'duration.max' => 'Длительность песни должна быть не более :max символов',
            'duration.min' => 'Длительность песни должна быть не менее :min символов',
        ];
    }
}

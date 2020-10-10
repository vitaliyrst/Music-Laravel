<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BaseFormRequest extends FormRequest
{
    public function getFormData()
    {
        $data = $this->request->all();
        $data = Arr::except($data, ['_token',]);
        $data['created_user_id'] = Auth::id();
        return $data;
    }
}

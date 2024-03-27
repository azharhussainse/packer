<?php

namespace App\Http\Requests\Backend\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-page');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:191', 'unique:pages,title,'.optional($this->route('page'))->id],
            'description' => ['required', 'string'],
            'status' => ['boolean'],
        ];
    }
}

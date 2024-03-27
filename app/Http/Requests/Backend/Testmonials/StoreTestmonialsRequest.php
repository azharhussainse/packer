<?php

namespace App\Http\Requests\Backend\Testmonials;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestmonialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-testmonial');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'testmonial' => ['required'],
            'author' => ['required', 'string'],
            'show_on_home' => ['boolean'],
        ];
    }

    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'testmonial.required' => 'Question field is required.',
            'author.required' => 'Answer field is required.',
        ];
    }
}

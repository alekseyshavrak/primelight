<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'       => ['required', 'min:1', 'max:64'],
            'surname'    => ['required', 'min:1', 'max:64'],
            'email'      => ['required', 'email','min:1', 'max:64'],
            'message'    => ['required', 'max:10000'],
            'phone'      => ['min:1', 'max:20'],
            'company'    => ['min:1', 'max:64'],
            'country_id' => ['exists:countries,id'],

            # Files
            'cv_document'    => ['required', 'file', 'mimes:pdf,txt,docx,jpg,png', 'max:10000'],
            'other_document' => ['file', 'mimes:pdf,txt,docx,jpg,png', 'max:10000'],
        ];
    }
}

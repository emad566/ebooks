<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $primaryKey = 'StoreID';

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
            'book_title' => 'required|min:1|max:191',
            'teacher_name' => 'required|min:1|max:191',
            'book_file' => 'required|max:10000|mimes:doc,docx,pdf,zip,rar',
            'dep_id' => 'required',
        ];
    }
}

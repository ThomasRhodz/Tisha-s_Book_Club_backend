<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'BookTitle' => 'required|unique:tbl_book',
            'BookISBN' => 'required|unique:tbl_book',
            'BookAuthor' => 'required',
            'BookPublicationYear' => 'required',
            'BookPublisher'  => 'required',
            'BookCopies'  => 'required',
            'CategoryID' => 'exclude|required',
        ];
    }
}

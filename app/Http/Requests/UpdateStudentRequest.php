<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'fname'=>'required|min:3','lname'=>'required|min:2','phone'=>'max:16|min:10','fathername'=>'required','mothername'=>'required','email'=>'required|email','gender'=>'required','dob'=>'required|date','address'=>'required','subject'=>'required','image'=>'image|mimes:png,jpg', 
        ];
    }
}
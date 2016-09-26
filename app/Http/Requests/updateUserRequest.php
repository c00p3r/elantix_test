<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'  => 'required|alpha_dash|min:5|max:15',
            'full_name' => 'regex:/^[a-z ,.\'-]+$/i|max:63',
            'age'       => 'numeric|min:18|max:100',
            'gender'    => 'in:0,1,2',
            'city'      => 'regex:/^[a-z ,.\'-]+$/i|max:63',
        ];
    }
}

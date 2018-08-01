<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'username' => 'bail|required|string',
            'email' => 'bail|required|email',
            'subject' => 'bail|required|string',
            'text' => 'bail|required|string'
        ];
    }
}

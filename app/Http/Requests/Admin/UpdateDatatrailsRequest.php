<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDatatrailsRequest extends FormRequest
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
            
            'view' => 'max:2147483647|nullable|numeric',
            'progress' => 'max:2147483647|nullable|numeric',
            'rating' => 'max:2147483647|nullable|numeric',
        ];
    }
}

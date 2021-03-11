<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\kegiatan;

class UpdatekegiatanRequest extends FormRequest
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
        $rules = kegiatan::$rules;
        
        return $rules;
    }
    public function messages()
    {
        $messages = kegiatan::$messages;
        
        return $messages;
    }
}

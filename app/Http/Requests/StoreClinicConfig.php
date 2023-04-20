<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicConfig extends FormRequest
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
            //
            'monday' => ['nullable',],
            'tuesday' => ['nullable',],
            'wednesday' => ['nullable',],
            'thursday' => ['nullable',],
            'friday' => ['nullable',],
            'saturday' => ['nullable',],
            'sunday' => ['nullable',],
            'start_time' => ['required',],
            'end_time' => ['required',],
        ];
    }
}

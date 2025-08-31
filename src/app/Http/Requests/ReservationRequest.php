<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required|date|after:tomorrow',
            'time' => 'required|date_format:H:i|after_or_equal:11:00|before_or_equal:22:00',
            'headcount' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'date.after' => '予約日は明日以降の日付を指定してください。',
        ];
    }
}

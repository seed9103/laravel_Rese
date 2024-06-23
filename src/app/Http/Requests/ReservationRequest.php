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
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
            'num_people' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required' => '予約日を選択してください。',
            'reservation_date.after_or_equal' => '予約日は今日以降の日付にしてください。',
            'reservation_time.required' => '予約時間を選択してください。',
            'num_people.required' => '人数を入力してください。',
            'num_people.min' => '人数は1人以上にしてください。',
        ];
    }
}

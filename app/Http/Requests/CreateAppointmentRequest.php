<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' =>'required|email',
            'time' => [
                'required',
                'date_format:"d-m-Y H:i"',
                function($attribute, $value, $fail) {

                    $appointmentDate = Carbon::parse($value);

                    //Check for available time end values - Time slots are 1 hour long
                    $appointmentTime = Carbon::createFromTime($appointmentDate->hour, $appointmentDate->minute);
                    $earliestTime = Carbon::createFromTimeString('09:00');
                    $latestTime = Carbon::createFromTimeString('16:00');
                    $breakStart = Carbon::createFromTimeString('13:00');

                    if (!  $appointmentTime->between($earliestTime, $latestTime)) {
                        return $fail($attribute.' must be between 09:00 and 17:00');
                    }
                    if($appointmentTime->equalTo($breakStart)){
                        return $fail($attribute.' must not be within lunch break (13:00 and 14:00)');
                    }

                    //Check for taken appointments
                    $appointment = Appointment::where('time', $appointmentTime)->first();

                    if ($appointment != null) {
                        return $fail('Appointment already taken. Please choose another time.');
                    }

                }
            ]
        ];
    }
}

<?php

namespace App\Observers;

use App\Jobs\SendAppointmentCreatedEmailJob;
use App\Mail\AppointmentCreatedEmail;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function created(Appointment $appointment)
    {
        //In real scenario notifications for app users would be used
        dispatch(new SendAppointmentCreatedEmailJob($appointment));
    }
}

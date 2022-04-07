<?php

namespace App\Observers;

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
        Mail::to($appointment->email)->send(new AppointmentCreatedEmail());
        Mail::to('secretary@mail.com')->send(new AppointmentCreatedEmail());
        Mail::to('lawyer@mail.com')->send(new AppointmentCreatedEmail());
    }
}

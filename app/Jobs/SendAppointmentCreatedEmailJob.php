<?php

namespace App\Jobs;

use App\Mail\AppointmentCreatedEmail;
use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAppointmentCreatedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Appointment $appointment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //In real scenario app users would be mailed (hard coded for simplicity)
        Mail::to($this->appointment->email)->send(new AppointmentCreatedEmail());
        Mail::to('secretary@mail.com')->send(new AppointmentCreatedEmail());
        Mail::to('lawyer@mail.com')->send(new AppointmentCreatedEmail());
    }
}

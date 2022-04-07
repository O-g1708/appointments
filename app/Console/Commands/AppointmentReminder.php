<?php

namespace App\Console\Commands;

use App\Jobs\SendAppointmentReminderEmailJob;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class AppointmentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Appointment reminder emails before the meeting';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Check if there are emails to send in following hour and dispatch a job
        $appointments = Appointment::where('time', '<=', Carbon::now()->add(1, 'hour')->toDateTimeString())
            ->where('time', '>', Carbon::now()->toDateTimeString())
            ->where('notified', 0)
            ->get();

        foreach ($appointments as $appointment){
            dispatch(new SendAppointmentReminderEmailJob($appointment));
            $appointment->notified = 1;
            $appointment->save();
        }
    }
}

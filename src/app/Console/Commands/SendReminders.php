<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationReminder;

class SendReminders extends Command
{
    protected $signature = 'reminders:send';

    protected $description = 'Send reservation reminders to users';

    public function handle()
    {
        
        $reservations = Reservation::whereDate('reservation_date', now()->toDateString())->get();

            
            
           
        
    }
}

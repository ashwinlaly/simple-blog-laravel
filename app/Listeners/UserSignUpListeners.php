<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserSignUpEmail;

class UserSignUpListeners implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new UserSignUpEmail());
        // dd($event);
        // Mail::to($event->user->email)->send(new UserSignUpEmail());
    }
}

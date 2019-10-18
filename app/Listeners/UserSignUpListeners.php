<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserSignUpEmail;

class UserSignUpListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Mail::to('ashwinlaly@gmail.com')->send(new UserSignUpEmail());
        // dd($event->user->email);
        Mail::to($event->user->email)->send(new UserSignUpEmail());
    }
}

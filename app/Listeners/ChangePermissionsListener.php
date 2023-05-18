<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class ChangePermissionsListener
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
        $command = $event->command;


        if (Str::contains($command, 'make') ) {
            $command = 'chmod 777 -R /var/www/html';
            $process = new Process($command);
            $process->run();
        }
    }
}

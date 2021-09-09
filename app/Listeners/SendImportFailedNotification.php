<?php

namespace App\Listeners;

use App\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\ImportHasFailedNotification;

class SendImportFailedNotification
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
     * @param  ImportFailed  $event
     * @return void
     */
    public function handle(ImportFailed $event)
    {
        \Log::info($event);
        //$this->user->notify(new ImportHasFailedNotification($this->user));
    }
}

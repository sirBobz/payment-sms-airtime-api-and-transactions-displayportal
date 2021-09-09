<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\NotifyUserOfCompletedImportNotification;

class NotifyUserOfCompletedImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        $this->user->notify(new NotifyUserOfCompletedImportNotification($this->user));
    }
}

<?php

namespace App\Listeners;

use App\Events\DownloadFileEvent;
use App\Models\Stream;
use App\Models\User;
use App\Notifications\DownloadFileNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DownloadFileListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DownloadFileEvent $event): void
    {
       
        DB::table("files")
        ->where("fileName","=",$event->arrayData["fileName"])
        ->update([
            'total_download' => DB::raw('total_download + 1'),
        ]);

        $stream=new Stream();
        $stream->ip_address=$event->arrayData["ip_address"];
        $stream->user_agent=$event->arrayData["user_agent"];
        $stream->file_id=DB::table("files")
        ->where("fileName","=",$event->arrayData["fileName"])
        ->first("id")->id;
        $stream->save();

        Notification::send(
            User::find(DB::table("files")
            ->where("fileName","=",$event->arrayData["fileName"])
            ->first("user_id")->user_id)
            ,
            new DownloadFileNotification($event->arrayData["fileName"])
        );
    }
}

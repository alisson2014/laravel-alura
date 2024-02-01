<?php

namespace App\Listeners;

use App\Mail\SeriesCreated;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Models\User;

class EmailUsersAboutSeriesCreated
{
    public function __construct()
    {
        //
    }

    public function handle(SeriesCreatedEvent $event): void
    {
        foreach(User::all() as $i => $user) {            
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason
            );
            $when = now()->addSeconds($i * 3);
            \Mail::to($user)->later($when, $email);
        }
    }
}

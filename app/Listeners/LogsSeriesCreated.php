<?php

namespace App\Listeners;

use App\Events\SeriesCreated;

class LogsSeriesCreated
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
    public function handle(SeriesCreated $event): void
    {
        \Log::info("Série {$event->seriesName} criada com sucesso.");
    }
}

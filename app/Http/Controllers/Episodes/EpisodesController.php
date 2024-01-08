<?php

namespace App\Http\Controllers\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Season;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }
}

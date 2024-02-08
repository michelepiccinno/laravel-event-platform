<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $data = [
            "success" => "true",
            "results" => $events
        ];
        return response()->json($data);
    }
}

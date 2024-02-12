<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $data = [
            "success" => "true",
            "payload" => $events,

        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $event = Event::with("user",'tags')->find($id);

        return response()->json([
            "success" => $event ? true : false,
            "payload" => $event ? $event : "Nessun evento corrispondente all'id"
        ]);
    }
}

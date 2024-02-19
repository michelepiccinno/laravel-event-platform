<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Models\Tag;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { {
            $tags = Tag::all();
            return view("admin.events.create", compact("tags"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validati = $request->validated();
        $newEvent = new Event();
        $newEvent->fill($validati);
        $newEvent->save();
        if ($request->tags) {
            $newEvent->tags()->attach($request->tags);
        }
        // return redirect()->route("admin.Events.show", $newEvent->id);
        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}

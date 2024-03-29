<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)->get();
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
        $validati["user_id"] = Auth::id();
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
        $tags = Tag::all();
        return view("admin.events.edit", compact("event", "tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $dati_validati = $request->validated();
        $event->update($dati_validati);              //update con idati validati dalla request
        if ($request->tags) {                        //per l'update dei tag sincronizzo la tabella pivot con i tags provenienti dalla request
            $event->tags()->sync($request->tags);
        }
        return redirect()->route('admin.events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event -> delete();
        return redirect()->route("admin.events.index");
    }
}

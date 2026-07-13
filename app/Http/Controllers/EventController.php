<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function index()
    {
        $events = Event::all();
        $data = [
            'events' => $events,
            'active_page' => 'event_list',
        ];
        return view('admin.event.list', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create Event',
            'active_page' => 'create_event',
        ];
        return view('admin.event.create', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->save();

        return redirect()->route('event.list')->with('success', 'Event created successfully.');
        
    }
}

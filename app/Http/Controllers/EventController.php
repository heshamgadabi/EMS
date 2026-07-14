<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

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
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'status' => 'required|in:0,1',
        ]);

        $user = Auth::user();

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->status = $request->status ?? 0; // Set to 0 if not provided
        
        $event->created_by = $user->id;//auth()->user()->id;
        
        $event->save();



        /*
        $event_data = [];
        $event_data['title'] = $request->title;
        $event_data['description'] = $request->description;
        $event_data['start_time'] = $request->start_time;       
        $event_data['end_time'] = $request->end_time;
        Event::create($event_data);
        */


        return redirect()->route('event.list')->with('success', 'Event created successfully.');
        
    }
}

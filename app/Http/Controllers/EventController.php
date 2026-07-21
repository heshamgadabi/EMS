<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
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

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $data = [
            'event' => $event,
            'title' => 'Edit Event',
            'active_page' => 'edit_event',
        ];
        return view('admin.event.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'status' => 'required|in:0,1',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->status = $request->status ?? 0; // Set to 0 if not provided
        $event->save();

        return redirect()->route('event.list')->with('success', $event->title . ' updated successfully.');
    }   

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event.list')->with('success', $event->title . ' deleted successfully.');
    }

    public function admin($id)
    {
        $event = Event::findOrFail($id);
        
        $tickets = Ticket::where('event_id', $event->id)->get();


        $data = [
            'event' => $event,
            'title' => 'Event Details',
            'tickets' => $tickets,
            'active_page' => 'event_list',
        ];
        return view('admin.event.admin', $data);
    }

    public function createTicket($id)
    {
        
    
        $event = Event::findOrFail($id);
        $data = [
            'event' => $event,
            'title' => 'Create Ticket',
            'active_page' => 'create_ticket',
        ];
        return view('admin.event.create_ticket', $data);
    }

    function storeTicket(Request $request, $id)
    {
       
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:0,1',
        ]);

        $user = Auth::user();

        $event = Event::findOrFail($id);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->location = $request->location;
        $ticket->price = $request->price;
        $ticket->status = $request->status ?? 0; // Set to 0 if not provided
        $ticket->event_id = $event->id; // Associate the ticket with the event
        $ticket->created_by = $user->id;//auth()->user()->id;
        
        
        
        $ticket->save();

        return redirect()->route('event.admin', ['id' => $event->id])->with('success', $ticket->title . ' created successfully.');

        
    }


    public function editTicket($ticket_id)
    {
     
        $ticket = Ticket::findOrFail($ticket_id);
        $data = [
            'ticket' => $ticket,
            'title' => 'Edit Ticket',
            'active_page' => 'edit_ticket',
        ];

        $event = Event::findOrFail($ticket->event_id);
        $data['event'] = $event;
        

        return view('admin.event.edit_ticket', $data);
    }

    public function updateTicket(Request $request, $ticket_id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:0,1',
        ]);

        $ticket = Ticket::findOrFail($ticket_id);
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->location = $request->location;
        $ticket->price = $request->price;
        $ticket->status = $request->status ?? 0; // Set to 0 if not provided
        $ticket->save();

        return redirect()->route('event.admin', ['id' => $ticket->event_id])->with('success', $ticket->title . ' updated successfully.');
    }

    public function deleteTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $event_id = $ticket->event_id; // Store the event ID before deleting the ticket
        $ticket->delete();

        return redirect()->route('event.admin', ['id' => $event_id])->with('success', $ticket->title . ' deleted successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Photos;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function eventDetails($id)
    {
        // You can retrieve the event details using the $id parameter
        // For example, you can fetch the event from the database and pass it to the view
         $event = Event::findOrFail($id);

         $banner = Photos::where(['event_id' => $id,'type' => 'banner'])->latest()->first();
         $gallery = Photos::where(['event_id' => $id,'type' => 'gallery'])->latest()->get();
         
         
         
         $data = [
            'event' => $event,
            'banner' => $banner,
            'gallery' => $gallery,
        ];

         return view('front.event-details', $data);

  
    }

    public function eventTicket($id)
    {
        // You can retrieve the event details using the $id parameter
        // For example, you can fetch the event from the database and pass it to the view
         $event = Event::findOrFail($id);

         $data = [
            'event' => $event,
        ];

         return view('front.event-ticket', $data);

  
    }
    
}

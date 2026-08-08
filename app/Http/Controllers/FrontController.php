<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
         return view('front.event-details', compact('event'));

  
    }
    
}

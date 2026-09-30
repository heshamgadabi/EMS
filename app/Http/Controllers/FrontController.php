<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Photos;
use App\Models\Ticket;
use App\Models\Invoice;
use App\Services\QrCodeService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

         $tickets = Ticket::where('event_id', $id)->get();
         $data['tickets'] = $tickets;
         
         return view('front.event-ticket', $data);

  
    }

    public function ticketCheckout(Request $request, $id)
    {
        // Handle the ticket checkout logic here
        // You can access the selected ticket quantities from the request
        // For example, you can retrieve the ticket quantities using $request->input('ticket_{ticket_id}')
        
        // Perform necessary validations and processing for the checkout
        
        // Redirect or return a response after successful checkout
      //  return redirect()->route('home')->with('success', 'Ticket checkout successful!');
      
        $ticket_arr = [];

        $tickets = Ticket::where('event_id', $id)->get();
        $total_price_all = 0;
        foreach ($tickets as $ticket) 
            {
                $ticket_id = $ticket->id;
                $quantity = $request->input('ticket_' . $ticket_id, 0);
                if ($quantity > 0) {
                        $ticket->quantity = $quantity;
                        $ticket->total_price = $quantity * $ticket->price;
                        $total_price_all += $ticket->total_price;
                        $ticket->confirmation = 'MAC-' . strtoupper(uniqid()); // Generate a unique confirmation number
                        
                        $ticket_arr[$ticket_id] = $ticket;
                    }
            }

        $invoice = new Invoice();
        $invoice->user_id = auth()->user()->id; // Assuming you have user authentication
        $invoice->event_id = $id;
        $invoice->total_amount = $total_price_all;
        $invoice->status = 'pending'; // Set the initial status of the invoice
        $invoice->invoice_number = 'INV-' . strtoupper(uniqid()); // Generate a unique invoice number
        $tax = 15; // Example tax percentage
        $tax_amount = ($total_price_all * $tax) / 100;
        $invoice->tax = $tax;
        $invoice->tax_amount = $tax_amount;
        $invoice->total_amount_with_tax = $total_price_all + $tax_amount;
        $invoice->discount_amount = 0; // Set the discount amount if applicable
        $invoice->save();

        // Save the ticket details in the invoice_ticket table
        foreach ($ticket_arr as $ticket_id => $ticket) {
            $invoice->tickets()->attach($ticket_id, [
                'quantity' => $ticket->quantity,
                'unit_price' => $ticket->price,
                'total_price' => $ticket->total_price,
                'ticket_title' => $ticket->title, // Save the ticket title as a snapshot
                'confirmation' => $ticket->confirmation, // Save the confirmation number
            ]);
            
        }
            
      
        return redirect()->route('front.tickets.checkout.summary', ['id' => $invoice->id])->with('success', 'Ticket checkout successful!');
         
    }

    public function ticketCheckoutSummary($id)
    {
        $invoice = Invoice::with('tickets')->findOrFail($id);

        // Check if the authenticated user is the owner of the invoice
       
        if ($invoice->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized access');
        }

        $event = Event::findOrFail($invoice->event_id);

        $thumbnail = Photos::where(['event_id' => $event->id,'type' => 'Thumbnail'])->latest()->first();
        
        
        $data = [
            'invoice' => $invoice,
            'event' => $event,
            'thumbnail' => $thumbnail,
        ];
       
        return view('front.ticket-checkout-summary', $data);
        
       
    }


    public function ticketCheckoutSuccess($id)
    {
        $invoice = Invoice::with('tickets')->findOrFail($id);

        //print_r($invoice);
        // Check if the authenticated user is the owner of the invoice
       
        if ($invoice->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized access');
        }

        $user_invoice = User::where('id', $invoice->user_id)->first();


/*
        $invoice->status = 'paid'; // Update the status to 'paid'
        $invoice->save();
*/


        $event = Event::findOrFail($invoice->event_id);

        $thumbnail = Photos::where(['event_id' => $event->id,'type' => 'Thumbnail'])->latest()->first();
       
        $qrCodeService = new QrCodeService();
        $qrCodeImage = $qrCodeService->generateBase64($invoice->invoice_number);
        
        //BarcodeService::generateSvg($invoice->invoice_number, 50);
        
        $data = [
            'invoice' => $invoice,
            'user_invoice' => $user_invoice,
            'event' => $event,
            'thumbnail' => $thumbnail,
            'qrCodeImage' => $qrCodeImage,
        ];
       
        return view('front.ticket-checkout-invoice-success', $data);
       // return view('front.ticket-checkout-success', $data);
        
       
    }


    public function ticketView($invoice_ticket_id)
    {
        
        $invoice_ticket = DB::table('invoice_ticket')->where('id', $invoice_ticket_id)->first();

        $invoice = Invoice::findOrFail($invoice_ticket->invoice_id);   
        $ticket = Ticket::findOrFail($invoice_ticket->ticket_id);
        $event = Event::findOrFail($invoice->event_id);
        $user_invoice = User::where('id', $invoice->user_id)->first();

        $thumbnail = Photos::where(['event_id' => $event->id,'type' => 'Thumbnail'])->latest()->first();
       
        $qrCodeService = new QrCodeService();
        $qrCodeImage = $qrCodeService->generateBase64($invoice_ticket->confirmation);
        




        $data = [
            'invoice_ticket' => $invoice_ticket,
            'invoice' => $invoice,
            'ticket' => $ticket,
            'event' => $event,
            'user_invoice' => $user_invoice,
            'thumbnail' => $thumbnail,
            'qrCodeImage' => $qrCodeImage,
        ];

        return view('front.ticket-view', $data);
    }


    public function myTickets()
    {
        

        $invoices = Invoice::where('user_id',auth()->user()->id)->with('tickets')->get();

        $data = ['invoices' => $invoices,'user' => auth()->user()];
        
        return view('front.my_tickets',$data);

    }

    
}

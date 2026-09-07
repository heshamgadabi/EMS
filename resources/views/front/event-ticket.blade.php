@extends('front.layout.app')

@section('title')
  {{ $event->title }} | تيكت فلو
@endsection


@section('content')

<main>
      

<section class="container-xl py-4">
       
     






        <div class="d-flex justify-content-start mb-4">
          <a href="event-details.html" class="ticket-page-back-link">
            <img
              src="{{ asset('front/assets/icons/icon-chevron-right-bold.svg') }}"
              alt=""
              width="24"
              height="24"
              class="ticket-page-chevron"
            />
            <div class="ticket-page-title-group">
              <h1 class="ticket-page-title">باتل كارت يوم النساء - جدة</h1>
              <div class="ticket-page-location">
                <img
                  src="{{ asset('front/assets/icons/icon-map-pin-bold.svg') }}"
                  alt=""
                  width="14"
                  height="14"
                />
                <span>Alandalus Mall</span>
              </div>
            </div>
          </a>
        </div>






        <!-- Ticket type cards: each has a quantity stepper -->
        <div class="ticket-cards" id="ticketCardsList">
          
        

          


          @foreach ($tickets as $ticket)


          <article class="ticket-card" data-price="{{ $ticket->price }}" data-ticket-id="{{ $ticket->id }}" >
            <div class="ticket-card-info">
              <p class="ticket-card-name">{{ $ticket->title }}</p>
              <p class="ticket-card-subtitle">{{ $ticket->description }}</p>
              <p class="ticket-card-price">SAR {{ number_format($ticket->price, 2) }}</p>
            </div>
            <div class="ticket-counter">
              <button
                type="button"
                class="ticket-counter-btn ticket-counter-minus"
                aria-label="إنقاص عدد التذاكر"
              >
                <img
                  src="{{ asset('front/assets/icons/icon-counter-minus.svg') }}"
                  alt=""
                  width="16"
                  height="16"
                />
              </button>
              <span class="ticket-counter-value" ticket_id="{{ $ticket->id }}">0</span>
              <button
                type="button"
                class="ticket-counter-btn ticket-counter-plus"
                aria-label="زيادة عدد التذاكر"
              >
                <img
                  src="{{ asset('front/assets/icons/icon-counter-plus.svg') }}"
                  alt=""
                  width="16"
                  height="16"
                />
              </button>
            </div>
          </article>




          @endforeach



        </div>
        


</section>



  <!-- ============================================================
         STICKY BOTTOM BAR — payment CTA, countdown, order summary.
         Fixed to the viewport so it stays visible while the ticket
         list scrolls; `.ticket-page-main` reserves matching bottom
         space so it never overlaps the footer.
         ============================================================ -->
      <div class="ticket-sticky-bar">
        <div class="container-xl ticket-sticky-bar-inner" id="ticketStickyBar">
          <div class="ticket-order-badge">
            <div class="ticket-tag">
              <img
                src="{{ asset('front/assets/icons/icon-ticket.svg') }}"
                alt=""
                width="16"
                height="16"
              />
              <span class="ticket-tag-count" id="ticketTotalCount">0x</span>
            </div>
            <span class="ticket-order-badge-label">تفاصيل الطلب</span>
          </div>

          <div class="ticket-timer-group">
            <span class="ticket-timer-label">الوقت المتبقي</span>
            <span class="ticket-timer-value" id="ticketCountdownTimer"
              >14:52</span
            >
          </div>

          <div class="ticket-pay-actions">
            <span class="ticket-pay-total" id="ticketTotalPrice">SAR 0.00</span>
            <button
              type="button"
              class="ticket-pay-btn"
              id="ticketPayBtn"
              disabled
            >
              الدفع
            </button>
          </div>
        </div>
      </div>   

         
</main>

<form action="{{ route('front.tickets.checkout', ['id' => $event->id]) }}" method="POST" id="ticketForm">
  @csrf
  <input type="hidden" name="event_id" value="{{ $event->id }}">

@foreach ($tickets as $ticket)
  <input type="hidden" name="ticket_{{ $ticket->id }}" value="0">
@endforeach

<button type="submit" class="btn btn-primary" id="ticketClickSubmit" style="display: none;">Submit</button>

</form>


@endsection



@extends('front.layout.app')

@section('title')
  {{ $event->title }} | تيكت فلو
@endsection


@section('content')

  <main class="ticket-page-main">
      <!-- ============================================================
         PAYMENT PAGE
         Figma: node 10:1252 "payment-event"
         ============================================================ -->
      <section class="container-xl payment-page-section">
        <div class="d-flex justify-content-start mb-4">
          <a href="ticket-selection.html" class="payment-page-title-link">
            <img
              src="{{ asset('front/assets/icons/icon-chevron-right-bold.svg') }}"
              alt=""
              width="16"
              height="16"
            />
            <h1 class="payment-page-title">العودة للفعالية</h1>
          </a>
        </div>

        <div class="payment-columns">
          <!-- Right column: order summary -->
          <div class="payment-column payment-column-side">
            <h2 class="payment-block-heading">ملخص الطلب</h2>

            <div class="payment-summary-card">
              <div class="payment-summary-media">
                <img src="{{ $thumbnail ? asset('storage/' . $thumbnail->path) : asset('front/assets/images/placeholder.png') }}" alt="" />
              </div>
              <div class="payment-summary-body">
                <div class="payment-summary-title-group">
                  <p class="payment-summary-title">
                    {{ $event->title }}
                  </p>
                  <p class="payment-summary-subtitle"> {{ $event->location }} </p>
                </div>

                <hr class="payment-summary-divider" />

                <!--div class="payment-summary-datetime">
                  <div class="payment-summary-date">
                    <img
                      src="{{ asset('front/assets/icons/icon-calendar-outline.svg') }}"
                      alt=""
                      width="16"
                      height="16"
                    />
                    <span>الجمعة 24 يوليو</span>
                  </div>
                  <span class="payment-summary-time">21:00</span>
                </div-->


                <div class="payment-summary-ticket">
                  <div class="payment-summary-ticket-info">
                    <p class="payment-summary-ticket-name">تذكرة لشخص واحد</p>
                    <p class="payment-summary-ticket-desc">
                      الجلوس بطاولة الحضور، الأوركسترا
                    </p>
                  </div>
                  <img
                    src="{{ asset('front/assets/icons/icon-ticket.svg') }}"
                    alt=""
                    width="24"
                    height="24"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Left column: payment method + additional services -->
          <div class="payment-column payment-column-main">
            <div class="payment-block">

              
            
              <div class="payment-summary-card">
                <div class="payment-summary-body">
                  <h2 class="payment-block-heading">التذاكر في الفاتورة</h2>
              

                  @foreach ($invoice->tickets as $ticket)

                  <div class="payment-summary-ticket">
                    <div class="payment-summary-ticket-info">
                      <p class="payment-summary-ticket-name">{{ $ticket->pivot->ticket_title }}</p>
                      <p class="payment-summary-ticket-desc">
                      {{ $ticket->description }} 
                      
                      </p>
                    </div>
                    <span class="payment-summary-ticket-price"> {{ $ticket->pivot->quantity }}</span>

                    <span class="payment-summary-ticket-price"> <a href="{{ route('front.ticket.view', [$ticket->pivot->id]) }}" target="_blank" class="btn btn-outline-success"> عرض </a> </span>
                    
                  </div>
                  @endforeach


                  

                  
                  
                </div>
              </div>
              
            </div>

          </div>
        </div>
      </section>

      
    </main>

@endsection
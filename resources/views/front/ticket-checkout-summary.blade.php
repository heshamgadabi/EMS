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
            <h1 class="payment-page-title">الدفع</h1>
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
                  <h2 class="payment-block-heading">ملخص الطلب</h2>
              
                  <div class="payment-summary-ticket">
                    <div class="payment-summary-ticket-info">
                      <p class="payment-summary-ticket-name">تذكرة لشخص واحد</p>
                      <p class="payment-summary-ticket-desc">
                        الجلوس بطاولة الحضور، الأوركسترا
                      </p>
                    </div>
                    <span class="payment-summary-ticket-price">SAR 79.00</span>
                  </div>

                  <div class="payment-summary-ticket">
                    <div class="payment-summary-ticket-info">
                      <p class="payment-summary-ticket-name">تذكرة لشخص واحد</p>
                      <p class="payment-summary-ticket-desc">
                        الجلوس بطاولة الحضور، الأوركسترا
                      </p>
                    </div>
                    <span class="payment-summary-ticket-price">SAR 79.00</span>
                  </div>

                  <hr class="payment-summary-divider" />

                  <div class="payment-summary-total">
                    <span>المجموع</span>
                    <span>SAR 158.00</span>
                  </div>
                </div>
              </div>

              <h2 class="payment-block-heading">طريقة الدفع</h2>

              <div class="payment-method-card">
                <div class="payment-method-header">
                  <div class="payment-method-title">
                    <img
                      src="{{ asset('front/assets/icons/icon-radio-selected.svg') }}"
                      alt=""
                      width="20"
                      height="20"
                    />
                    <span>بطاقة بنكية</span>
                  </div>
                  <div class="payment-method-logos">
                    <img
                      src="{{ asset('front/assets/icons/pay-mada.svg') }}"
                      alt="mada"
                      height="18"
                    />
                    <img
                      src="{{ asset('front/assets/icons/pay-visa.svg') }}"
                      alt="Visa"
                      height="13"
                    />
                    <img
                      src="{{ asset('front/assets/icons/pay-mastercard.svg') }}"
                      alt="Mastercard"
                      height="18"
                    />
                  </div>
                </div>

                 
              </div>
            </div>

            <div class="payment-block">
              <h2 class="payment-block-heading">خدمات إضافية</h2>

              <div class="payment-insurance-card">
                <label class="payment-insurance-details">
                  <span class="payment-checkbox">
                    <input type="checkbox" checked />
                    <span class="payment-checkbox-box">
                      <img
                        src="assets/icons/icon-checkbox-check.svg"
                        alt=""
                        width="12"
                        height="12"
                      />
                    </span>
                  </span>
                  <span class="payment-insurance-label"
                    >ضمان استرجاع المبلغ</span
                  >
                </label>
                <button
                  type="button"
                  class="payment-info-trigger"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="استرجع كامل قيمة تذاكرك حتى لو تعذر حضورك للفعالية"
                  aria-label="معلومات عن ضمان استرجاع المبلغ"
                >
                  <img src="assets/icons/icon-info.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ============================================================
         STICKY BOTTOM BAR — payment CTA, countdown, order summary.
         Reused verbatim from ticket-selection.html: same markup, CSS
         and JS (js/main.js), just seeded with this order's static totals
         since there are no ticket steppers on this page to compute them.
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
              <span class="ticket-tag-count" id="ticketTotalCount">2x</span>
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
            <span class="ticket-pay-total" id="ticketTotalPrice"
              >SAR 158.00</span
            >
            <button type="button" class="ticket-pay-btn" id="ticketPayBtn">
              الدفع
            </button>
          </div>
        </div>
      </div>
    </main>

@endsection
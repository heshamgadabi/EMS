@extends('front.layout.app')

@section('title')
  تذاكري | تيكت فلو
@endsection


@section('content')

<main>
      <!-- ============================================================
         PROFILE PAGE
         Figma: node 6:67 "user-profile-page"
         Sidebar (profile card / wallet / account menu) is first in the DOM
         so it lands on the right edge under dir="rtl" (no order utilities),
         matching the main nav/footer convention on this site; the form
         card follows and lands on the left.
         ============================================================ -->
      <section class="container-xl profile-page-section">
        <h1 class="profile-page-title"> الملف الشخصي</h1>

        <div class="profile-columns">
          <!-- Sidebar: avatar, membership badge, wallet, account menu -->
          <aside class="profile-sidebar">
            <div class="profile-avatar">
              <div class="profile-avatar-circle">
                <span
                  class="profile-avatar-icon"
                  role="img"
                  aria-label="الصورة الشخصية لـ Ahmad Khalid"
                ></span>
              </div>
              <label
                for="profileAvatarUpload"
                class="profile-avatar-edit-btn"
                aria-label="تغيير الصورة الشخصية"
              >
                <i class="bi bi-camera-fill"></i>
                <input
                  type="file"
                  id="profileAvatarUpload"
                  accept="image/*"
                  class="visually-hidden"
                />
              </label>
            </div>

            <div class="profile-name-group">
              <p class="profile-name">{{ $user->name }}</p>
              <span class="profile-membership-badge">العضوية القياسية</span>
            </div>

            <hr class="profile-divider" />



            <nav class="profile-menu" aria-label="حساب المستخدم">
              
             <a
                href="{{ route('user.profile') }}"
                class="profile-menu-item "
                aria-current="page"
              >
                <i class="bi bi-person-circle"></i>
                 الملف الشخصي
              </a>

              <a href="#" class="profile-menu-item">
                <i class="bi bi-heart"></i>
                المفضلة
              </a>
              <a href="{{ route('my.tickets','new') }}" class="profile-menu-item active">
                <i class="bi bi-ticket-perforated"></i>
                تذاكري
              </a>
              
              <a href="{{ route('my.invoices','new') }}" class="profile-menu-item">
                <i class="bi bi-ticket-perforated"></i>
                فواتيري
              </a>

              <a href="{{ route('user.signout') }}" class="profile-menu-item profile-menu-item--danger">
                <i class="bi bi-box-arrow-right"></i>
                تسجيل الخروج
              </a>
            </nav>
          </aside>

          <!-- Main: tabbed form card -->
          <div class="profile-main">
            <div class="profile-card">
              <div class="profile-tabs" role="tablist">
                <a href="{{ route('my.tickets','new') }}" class="profile-tab {{ $type == 'new' ? 'active' : '' }}" data-tab="info" role="tab" aria-selected="true" >تذاكري الجديدة</a>

                <a href="{{ route('my.tickets','old') }}" class="profile-tab {{ $type == 'old' ? 'active' : '' }}" data-tab="info" role="tab" aria-selected="true" >تذاكري القديمة</a>
                
                
              </div>

              <div data-panel="info">

               @foreach($invoice_tickets as $invoice_ticket)
                <div class="ticket-card mb-3">
                  <div class="ticket-card-header">
                    <h2 class="ticket-card-title">{{ $invoice_ticket->ticket_title }}</h2>
                    <p class="ticket-card-subtitle">عدد الاشخاص في التذكرة: {{ $invoice_ticket->quantity }}</p>
                    <span class="ticket-card-date">{{ $invoice_ticket->event_title }}</span>
                  </div>
                  <div class="ticket-card-body">
                    <p class="ticket-card-info"> {{ $invoice_ticket->paid_at }}</p>
                    <p class="ticket-card-info"> <a href="{{ route('front.ticket.view', [$invoice_ticket->id]) }}" target="_blank" class="btn btn-outline-success"> عرض </a> </span>
                   </p>
                  </div>
                </div>
                @endforeach

              </div>
              
              

              
               
 
            </div>
          </div>
        </div>
      </section>
    </main>


@endsection
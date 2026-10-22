@extends('front.layout.app')

@section('title')
  الفعاليات | تيكت فلو
@endsection


@section('content')

<main>
      <!-- ============================================================
         EVENT LIST PAGE
         Figma: node 12:992 "event-list-page"
         ============================================================ -->
      <section class="container-xl py-5">
        <!-- Header & Breadcrumbs -->
        <div class="d-flex flex-column align-items-start gap-3 mb-5">
          <nav class="breadcrumbs" aria-label="breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-link">الرئيسية</a>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current" aria-current="page"
              >جميع الفعاليات</span
            >
          </nav>
          <div class="page-title-block">
            <span class="page-title-bar"></span>
            <h1 class="page-title">جميع الفعاليات والأنشطة الترفيهية</h1>
          </div>
        </div>

        <!-- Search and Filter Control Panel -->
        <div class="filter-panel mb-4">
          <div class="filter-panel-row mb-3">
            <div class="filter-search">
              <i class="bi bi-search"></i>
              <input
                type="search"
                placeholder="ابحث عن فعاليات، فنانين، مسارح..."
                aria-label="ابحث عن فعاليات، فنانين، مسارح..."
              />
            </div>
            <div class="dropdown filter-sort">
              <button
                class="btn d-flex align-items-center gap-2 w-100"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <span class="flex-grow-1 text-start"
                  >الترتيب: الأحدث أولاً</span
                >
                <i class="bi bi-chevron-down small"></i>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item active" href="#">الأحدث أولاً</a>
                </li>
                <li><a class="dropdown-item" href="#">الأقرب تاريخًا</a></li>
                <li>
                  <a class="dropdown-item" href="#">السعر: من الأقل للأعلى</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">السعر: من الأعلى للأقل</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="category-chips">
            <button type="button" class="category-chip active">الكل</button>
            <button type="button" class="category-chip">حفلات</button>
            <button type="button" class="category-chip">مسرح</button>
            <button type="button" class="category-chip">رياضة</button>
            <button type="button" class="category-chip">مؤتمرات</button>
            <button type="button" class="category-chip">معارض</button>
            <button type="button" class="category-chip">ورش عمل</button>
          </div>
        </div>

        <!-- Results Summary -->
        <div class="results-summary mb-4">
          <div class="results-count">
            <span class="results-count-dot"></span>
            <span>عُثر على ١٢ فعالية متميزة</span>
          </div>
          <a href="#" class="clear-filters-link">مسح التصفية</a>
        </div>

        <!-- Event Grid: `.event-card` is the repeatable unit (see css/style.css). -->
        <div class="row g-4" id="eventListGrid">



        @foreach ($events as $event)

          @php
          $date = \Carbon\Carbon::parse($event->start_time)->locale('ar');
          @endphp

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="2">
              <a href="{{ route('event.details', $event->id) }}" class="event-card-media">
                
              
                <img
                  src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail->path) : asset('front/assets/images/placeholder.png') }}"
                  alt="{{ $event->title }}"
                />
                <button
                  type="button"
                  class="favorite-btn"
                  aria-label="أضف إلى المفضلة"
                  data-favorited="false"
                >
                  <img
                    src="{{ asset('front/assets/icons/icon-heart.svg') }}"
                    alt=""
                    width="20"
                    height="18"
                  />
                </button>
                <span class="badge-new">جديد</span>
              </a>
              <div class="event-card-body">
                <a href="{{ route('event.details', $event->id) }}" class="event-card-title text-decoration-none" >{{ $event->title }}</a>
                <div class="event-card-meta">  
                  <span class="event-card-price">{{ $event->start_price }} SAR</span>
                  <span class="event-card-price-label text-brand-green"></span>
                </div>
                <div class="event-card-date"> {{ $date->format('d') }} {{ $date->translatedFormat('F') }} <small> {{ $date->translatedFormat('l') }} {{ $date->format('Y') }}</small> </div>
              </div>
            </article>
          </div>
   
          
        

        @endforeach





          
          
        </div>


        @if ($events->hasPages())

        <div class="col-12 d-flex justify-content-center hes_hide">
          <div class="pagination-wrapper mt-4">
            {{ $events->links('front.my-pagination') }}
          </div>
        </div>
        @endif

        <!-- Pagination -->
        <!--nav class="pagination-row" aria-label="ترقيم الصفحات">
          <a href="#" class="pagination-arrow disabled" aria-disabled="true">
            <i class="bi bi-chevron-right small"></i>
            السابق
          </a>
          <div class="pagination-pages">
            <a href="#" class="pagination-page active" aria-current="page">1</a>
            <a href="#" class="pagination-page">2</a>
            <a href="#" class="pagination-page">3</a>
          </div>
          <a href="#" class="pagination-arrow">
            التالي
            <i class="bi bi-chevron-left small"></i>
          </a>
        </nav-->





      </section>
    </main>

@endsection
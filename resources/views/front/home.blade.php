@extends('front.layout.app')

@section('title')
  الرئيسية | تيكت فلو
@endsection


@section('content')
    <!-- ============================================================
       PROMO STRIP (small bar above the hero banner)
       ============================================================ -->
    <div class="promo-strip">
      <div class="container-xl py-4 d-flex align-items-center gap-2">
        <span class="text-body fw-bold">اكتشف أفضل الفعاليات في</span>
        <div class="dropdown">
          <button
            type="button"
            class="promo-strip-city d-flex align-items-center gap-1 fw-bold text-decoration-none"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            جدة
            <i class="bi bi-chevron-down"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item active" href="#">جدة</a></li>
            <li><a class="dropdown-item" href="#">الرياض</a></li>
            <li><a class="dropdown-item" href="#">الدمام</a></li>
            <li><a class="dropdown-item" href="#">مكة المكرمة</a></li>
            <li><a class="dropdown-item" href="#">المدينة المنورة</a></li>
          </ul>
        </div>
        <div class="ms-auto">
          <button
            type="button"
            class="promo-strip-calendar-btn rounded-circle d-flex align-items-center justify-content-center"
            aria-label="فتح التقويم"
            id="promoCalendarBtn"
          >
            <i class="bi bi-calendar3"></i>
          </button>
          <input
            type="date"
            id="promoCalendarInput"
            class="visually-hidden"
            tabindex="-1"
          />
        </div>
      </div>
    </div>

    <main>
      <!-- ============================================================
         HERO CAROUSEL
         Data note: each slide = one promoted campaign/event.
         Replace slide items below with a loop from the CMS/API.
         ============================================================ -->
      <section class="container-xl pb-4">
        <div
          id="heroCarousel"
          class="carousel slide hero-carousel"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="#" class="d-block hero-slide">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  class="hero-slide-img"
                  alt="موسم عسير 2026"
                />
              </a>
            </div>
            <div class="carousel-item">
              <a href="#" class="d-block hero-slide">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  class="hero-slide-img"
                  alt="كأس العالم للرياضات الإلكترونية"
                />
              </a>
            </div>
            <div class="carousel-item">
              <a href="#" class="d-block hero-slide">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  class="hero-slide-img"
                  alt="العروض الكوميدية"
                />
              </a>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev"
          >
            <span class="hero-arrow"><i class="bi bi-chevron-right"></i></span>
            <span class="visually-hidden">السابق</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next"
          >
            <span class="hero-arrow"><i class="bi bi-chevron-left"></i></span>
            <span class="visually-hidden">التالي</span>
          </button>
        </div>
      </section>

      <!-- ============================================================
         FEATURED EVENTS
         Data note: `.event-card` is the repeatable unit — each one
         maps to a single event record. Fields used: image, isFavorited,
         badge (optional "جديد"), title, priceLabel, priceLabelColor,
         price, date (optional), isFreeEntry (optional).
         ============================================================ -->
      <section class="container-xl py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="section-heading mb-0">
            <a
              href="#"
              class="text-decoration-none text-body d-flex align-items-center gap-2"
            >
              أبرز الفعاليات
              <i class="bi bi-chevron-left"></i>
            </a>
          </h2>
          <a
            href="events.html"
            class="section-link text-decoration-none d-flex align-items-center gap-2"
          >
            عرض الكل
            <i class="bi bi-chevron-left small"></i>
          </a>
        </div>

        <div class="row g-4" id="featuredEventsGrid">
          <!-- TEMPLATE START: repeat .event-card per event -->
          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="1">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="باتل كارت يوم النساء - جدة"
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
              </a>
              <div class="event-card-body">
                <a href="#" class="event-card-title text-decoration-none"
                  >باتل كارت يوم النساء - جدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">32.96 USD</span>
                  <span class="event-card-price-label text-success"
                    >نضمن أفضل الأسعار</span
                  >
                </div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="2">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="مراسي النيل في النادي الأدبي الثقافي بجدة"
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
                <a href="#" class="event-card-title text-decoration-none"
                  >مراسي النيل في النادي الأدبي الثقافي بجدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">27.19 USD</span>
                  <span class="event-card-price-label text-brand-green"
                    >أفضل المقاعد متاحة</span
                  >
                </div>
                <div class="event-card-date">الجمعة 07 أغسطس</div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="3">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="لاين اب تقدم تجارب أداء كوميدي لاب في جدة"
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
              </a>
              <div class="event-card-body">
                <a href="#" class="event-card-title text-decoration-none"
                  >لاين اب تقدم تجارب أداء كوميدي لاب في جدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price-label text-success"
                    >الدخول مجاني</span
                  >
                </div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="4">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="بي دي هاوس في جدة | 23 يوليو"
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
                <a href="#" class="event-card-title text-decoration-none"
                  >بي دي هاوس في جدة | 23 يوليو</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">31.59 USD</span>
                  <span class="event-card-price-label text-brand-green"
                    >تذاكر الحجز المسبق</span
                  >
                </div>
                <div class="event-card-date">الخميس 23 يوليو</div>
              </div>
            </article>
          </div>
          <!-- TEMPLATE END -->

          <!-- Second row: design repeats the same 4 events again (row 2 of the "featured" list) -->
          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="5">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="باتل كارت يوم النساء - جدة"
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
              </a>
              <div class="event-card-body">
                <a href="#" class="event-card-title text-decoration-none"
                  >باتل كارت يوم النساء - جدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">32.96 USD</span>
                  <span class="event-card-price-label text-success"
                    >نضمن أفضل الأسعار</span
                  >
                </div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="6">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="مراسي النيل في النادي الأدبي الثقافي بجدة"
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
                <a href="#" class="event-card-title text-decoration-none"
                  >مراسي النيل في النادي الأدبي الثقافي بجدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">27.19 USD</span>
                  <span class="event-card-price-label text-brand-green"
                    >أفضل المقاعد متاحة</span
                  >
                </div>
                <div class="event-card-date">الجمعة 07 أغسطس</div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="7">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="لاين اب تقدم تجارب أداء كوميدي لاب في جدة"
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
              </a>
              <div class="event-card-body">
                <a href="#" class="event-card-title text-decoration-none"
                  >لاين اب تقدم تجارب أداء كوميدي لاب في جدة</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price-label text-success"
                    >الدخول مجاني</span
                  >
                </div>
              </div>
            </article>
          </div>

          <div class="col-6 col-lg-3">
            <article class="event-card" data-event-id="8">
              <a href="#" class="event-card-media">
                <img
                  src="{{ asset('front/assets/images/placeholder.png') }}"
                  alt="بي دي هاوس في جدة | 23 يوليو"
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
                <a href="#" class="event-card-title text-decoration-none"
                  >بي دي هاوس في جدة | 23 يوليو</a
                >
                <div class="event-card-meta">
                  <span class="event-card-price">31.59 USD</span>
                  <span class="event-card-price-label text-brand-green"
                    >تذاكر الحجز المسبق</span
                  >
                </div>
                <div class="event-card-date">الخميس 23 يوليو</div>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- ============================================================
         EXCLUSIVE / PROMOTED EVENT BANNER
         ============================================================ -->
      <section class="container-xl pb-5">
        <a href="#" class="exclusive-banner text-decoration-none">
          <div class="exclusive-banner-media">
            <img
              src="{{ asset('front/assets/images/placeholder.png') }}"
              alt="نادي كارتل الاجتماعي في جدة"
            />
            <span class="badge-new badge-new-exclusive">حصري</span>
          </div>
          <div class="exclusive-banner-body">
            <h3 class="exclusive-banner-title">نادي كارتل الاجتماعي في جدة</h3>
            <div class="exclusive-banner-meta">
              <span class="d-flex align-items-center gap-2">
                <i class="bi bi-calendar3"></i>
                الخميس 23 يوليو - الاثنين 31 أغسطس
              </span>
              <span class="d-flex align-items-center gap-2">
                <i class="bi bi-ticket-perforated"></i>
                41.20 USD
              </span>
            </div>
          </div>
        </a>
      </section>

      <!-- ============================================================
         CATEGORIES
         Data note: `.category-item` is the repeatable unit (image + label).
         Design shows a scrollable row of circular category tiles;
         sample category names below stand in for the real taxonomy.
         ============================================================ -->
      <section class="container-xl py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="section-heading mb-0">
            <a
              href="#"
              class="text-decoration-none text-body d-flex align-items-center gap-2"
            >
              الفئات
              <i class="bi bi-chevron-left"></i>
            </a>
          </h2>
          <a
            href="#"
            class="section-link text-decoration-none d-flex align-items-center gap-2"
          >
            عرض الكل
            <i class="bi bi-chevron-left small"></i>
          </a>
        </div>

        <div class="category-row" id="categoryRow">
          <!-- TEMPLATE START: repeat .category-item per category -->
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>الحفلات الموسيقية</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>الفعاليات الرياضية</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>المسرح والفنون</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>تجارب العائلة</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>المؤتمرات</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>الأنشطة الخارجية</span>
          </a>
          <a href="#" class="category-item text-decoration-none">
            <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
            <span>الفعاليات الثقافية</span>
          </a>
          <!-- TEMPLATE END -->
        </div>

        <div class="text-center mt-5">
          <button type="button" class="btn btn-outline-dark btn-show-more">
            أظهر المزيد
          </button>
        </div>
      </section>

      <!-- ============================================================
         TRUST / FEATURES + PAYMENT METHODS
         ============================================================ -->
      <section>
        <div class="container-xl py-5">
          <h2 class="section-heading section-heading--s mb-4">
            ما الذي يميز منصة تيكت فلو عن غيرها؟
          </h2>

          <div class="row g-4 mb-5">
            <div class="col-6 col-lg-3">
              <div class="feature-item">
                <img
                  src="{{ asset('front/assets/icons/feature-secure-checkout.svg') }}"
                  alt=""
                  width="32"
                  height="32"
                />
                <h4>عملية شراء آمنة</h4>
                <p>دفع سريع وآمن</p>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="feature-item">
                <img
                  src="{{ asset('front/assets/icons/feature-instant-confirmation.svg') }}"
                  alt=""
                  width="32"
                  height="32"
                />
                <h4>تأكيد فوري</h4>
                <p>خدمة ضمان استرجاع اختيارية</p>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="feature-item">
                <img
                  src="{{ asset('front/assets/icons/feature-official-seller.svg') }}"
                  alt=""
                  width="32"
                  height="32"
                />
                <h4>الموقع الرسمي لبيع التذاكر</h4>
                <p>أكثر من 10 مليون مستخدم</p>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="feature-item">
                <img
                  src="{{ asset('front/assets/icons/feature-customer-service.svg') }}"
                  alt=""
                  width="32"
                  height="32"
                />
                <h4>خدمة العملاء على مدار الساعة</h4>
                <p>فريق دعم مخصص لخدمة العملاء وإدارة البيع</p>
              </div>
            </div>
          </div>

          <h3 class="payment-heading">اختيار طريقة الدفع المناسبة لك</h3>
          <div
            class="d-flex align-items-center flex-wrap gap-4 payment-methods"
          >
            <img src="{{ asset('front/assets/icons/pay-mada.svg') }}" alt="mada" height="27" />
            <img src="{{ asset('front/assets/icons/pay-visa.svg') }}" alt="Visa" height="19" />
            <img
              src="{{ asset('front/assets/icons/pay-mastercard.svg') }}"
              alt="Mastercard"
              height="26"
            />
            <img src="{{ asset('front/assets/icons/pay-stc.svg') }}" alt="STC Pay" height="27" />
            <img src="{{ asset('front/assets/icons/pay-apple.svg') }}" alt="Apple Pay" height="26" />
          </div>
        </div>
      </section>
    </main>

@endsection
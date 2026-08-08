@extends('front.layout.app')

@section('title')
  تفاصيل الفعالية | تيكت فلو
@endsection


@section('content')


<main>
      <!-- ============================================================
         EVENT DETAILS PAGE
         Figma: node 1:2737 "Body [body-fixed-header]"
         ============================================================ -->
      <section class="container-xl py-4">
        <!-- Breadcrumbs + favorite/share actions -->
        <div
          class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4"
        >
          <nav class="breadcrumbs" aria-label="breadcrumb">
            <a href="index.html" class="breadcrumb-link">الصفحة الرئيسية</a>
            <span class="breadcrumb-sep">/</span>
            <a href="events.html" class="breadcrumb-link">الفعاليات</a>
            <span class="breadcrumb-sep">/</span>
            <a href="events.html" class="breadcrumb-link"
              >الألعاب والرياضات الإلكترونية</a
            >
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current" aria-current="page"
              >باتل كارت يوم النساء - جدة</span
            >
          </nav>

          <div class="event-detail-actions">
            <div class="dropdown">
              <button
                type="button"
                class="event-share-link"
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside"
                aria-expanded="false"
              >
                <i class="bi bi-share"></i>
                مشاركة الفعالية
              </button>
              <ul class="dropdown-menu share-menu">
                <li>
                  <a
                    class="dropdown-item d-flex align-items-center gap-2"
                    href="#"
                    target="_blank"
                    rel="noopener"
                  >
                    <img
                      src="{{ asset('front/assets/icons/social-facebook.svg') }}"
                      alt=""
                      width="16"
                      height="16"
                    />
                    فيسبوك
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item d-flex align-items-center gap-2"
                    href="#"
                    target="_blank"
                    rel="noopener"
                  >
                    <img
                      src="{{ asset('front/assets/icons/social-x.svg') }}"
                      alt=""
                      width="16"
                      height="16"
                    />
                    إكس (تويتر)
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item d-flex align-items-center gap-2"
                    href="#"
                    target="_blank"
                    rel="noopener"
                  >
                    <img
                      src="{{ asset('front/assets/icons/social-telegram.svg') }}"
                      alt=""
                      width="16"
                      height="16"
                    />
                    تيليجرام
                  </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center gap-2 copy-link-btn"
                  >
                    <i class="bi bi-link-45deg"></i>
                    <span class="copy-link-label">نسخ الرابط</span>
                  </button>
                </li>
              </ul>
            </div>
            <button
              type="button"
              class="favorite-toggle-link"
              data-favorited="false"
            >
              <img
                src="{{ asset('front/assets/icons/icon-heart.svg') }}"
                alt=""
                width="16"
                height="16"
              />
              <span class="favorite-toggle-label">إضافة إلى المفضلة</span>
            </button>
          </div>
        </div>

        <!-- Featured image -->
        <a href="#" class="d-block hero-slide mb-5">
          <img
            src="{{ asset('front/assets/images/placeholder.png') }}"
            class="hero-slide-img"
            alt="باتل كارت يوم النساء - جدة"
          />
        </a>

        <!-- Content + sidebar -->
        <div class="row g-4 g-lg-5">
          <!-- Main content column (right side in RTL) -->
          <div class="col-lg-8">
            <div class="event-detail-header mb-4">
              <h1 class="page-title mb-4"> {{ $event->title }} </h1>
              <a href="#eventLocation" class="event-venue-link">
                <img
                  src="{{ asset('front/assets/icons/icon-geo-mark.svg') }}"
                  alt=""
                  width="10"
                  height="14"
                />
                Alandalus Mall
              </a>
            </div>

            <!-- More information -->
            <div class="event-section border-bottom pb-4 mb-4">
              <h2 class="event-section-heading">المزيد من المعلومات</h2>
              <div class="event-description">
                <p>
                  {{ $event->description }}
                </p>
                <h3 class="event-description-subheading">الشروط والاحكام:</h3>
                <ul class="event-terms-list">
                  
                
                  @foreach(explode('-', $event->terms) as $item)
                        <li>{{ trim($item) }}</li>
                  @endforeach
                </ul>
              </div>
            </div>

            <!-- Photo gallery -->
            <div class="event-section border-bottom pb-4 mb-4">
              <div
                class="d-flex align-items-center justify-content-between mb-4"
              >
                <h2 class="event-section-heading mb-0">استديو الصور</h2>
                <a href="#" class="event-section-more-link">أظهر المزيد</a>
              </div>
              <div class="gallery-row">
                <a
                  href="#"
                  class="gallery-thumb"
                  data-bs-toggle="modal"
                  data-bs-target="#galleryLightbox"
                  data-gallery-index="0"
                >
                  <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
                </a>
                <a
                  href="#"
                  class="gallery-thumb"
                  data-bs-toggle="modal"
                  data-bs-target="#galleryLightbox"
                  data-gallery-index="1"
                >
                  <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
                </a>
                <a
                  href="#"
                  class="gallery-thumb"
                  data-bs-toggle="modal"
                  data-bs-target="#galleryLightbox"
                  data-gallery-index="2"
                >
                  <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
                </a>
                <a
                  href="#"
                  class="gallery-thumb"
                  data-bs-toggle="modal"
                  data-bs-target="#galleryLightbox"
                  data-gallery-index="3"
                >
                  <img src="{{ asset('front/assets/images/placeholder.png') }}" alt="" />
                </a>
              </div>
            </div>

            <!-- Location -->
            <div
              id="eventLocation"
              class="event-section border-bottom pb-4 mb-4"
            >
              <h2 class="event-section-heading mb-4">الموقع</h2>
              <div class="location-card mb-4">
                <div class="location-card-badge">
                  <img
                    src="{{ asset('front/assets/icons/icon-location-badge.svg') }}"
                    alt=""
                    width="24"
                    height="24"
                  />
                  <span class="location-card-badge-title">موقع الفعالية</span>
                  <span class="location-card-badge-subtitle">الموقع</span>
                </div>
                <h3 class="location-card-title">Alandalus Mall</h3>
                <p class="location-card-address">
                  G649+R6J, Al Fayha'a, Jeddah 22245, Saudi Arabia
                </p>
                <a href="#" class="location-directions-link">
                  اطلع على الخريطة لمعرفة الاتجاه الصحيح
                  <i class="bi bi-chevron-left"></i>
                </a>
              </div>
              <img
                src="{{ asset('front/assets/images/placeholder.png') }}"
                class="location-map"
                alt="خريطة موقع الفعالية"
              />
            </div>

            <!-- Related events -->
            <div class="event-section pb-2">
              <h2 class="event-section-heading mb-4">قد يعجبك أيضًا</h2>
              <div class="row g-4">
                <div class="col-6">
                  <article class="event-card" data-event-id="101">
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

                <div class="col-6">
                  <article class="event-card" data-event-id="102">
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
            </div>
          </div>

          <!-- Sidebar (left side in RTL): buy box + safe-tickets card -->
          <div class="col-lg-4">
            <div class="event-detail-sidebar">
              <div class="buy-box mb-3">
                <div class="buy-box-row">
                  <div class="buy-box-price-block">
                    <span class="buy-box-price-label">الأسعار تبدأ من:</span>
                    <span class="buy-box-price">32.96 USD</span>
                  </div>
                  <a href="#" class="btn buy-box-cta">اختيار التذاكر</a>
                </div>
                <span class="buy-box-tag">نضمن أفضل الأسعار</span>
              </div>

              <div class="safe-tickets-card">
                <p class="safe-tickets-heading">
                  <i class="bi bi-shield-check"></i>
                  تذاكر آمنة - هاتفك هو تذكرتك الديناميكية
                </p>
                <p class="safe-tickets-text">
                  يمكنك الوصول بسهولة إلى تذاكرك
                  <strong>من خلال تطبيق تيكت فلو فقط</strong>. تتميز تذاكر هذه
                  الفعالية بحماية إضافية بفضل رمز الاستجابة السريعة QR
                  الديناميكي.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ============================================================
         TRUST / FEATURES + PAYMENT METHODS
         (same pattern as the homepage's trust section)
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

      <!-- ============================================================
         GALLERY LIGHTBOX
         Populated/navigated by initGalleryLightbox() in js/main.js.
         ============================================================ -->
      <div
        class="modal fade gallery-lightbox"
        id="galleryLightbox"
        tabindex="-1"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
          <div class="modal-content">
            <button
              type="button"
              class="btn-close btn-close-white gallery-lightbox-close"
              data-bs-dismiss="modal"
              aria-label="إغلاق"
            ></button>
            <div
              class="modal-body d-flex align-items-center justify-content-center"
            >
              <button
                type="button"
                class="gallery-lightbox-arrow gallery-lightbox-prev"
                aria-label="الصورة السابقة"
              >
                <i class="bi bi-chevron-right"></i>
              </button>
              <img
                src="{{ asset('front/assets/images/placeholder.png') }}"
                alt=""
                class="gallery-lightbox-img"
                id="galleryLightboxImg"
              />
              <button
                type="button"
                class="gallery-lightbox-arrow gallery-lightbox-next"
                aria-label="الصورة التالية"
              >
                <i class="bi bi-chevron-left"></i>
              </button>
            </div>
            <div class="gallery-lightbox-counter" id="galleryLightboxCounter">
              1 / 4
            </div>
          </div>
        </div>
      </div>
    </main>



@endsection
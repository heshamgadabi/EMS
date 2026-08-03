<!-- ============================================================
       HEADER / NAV
       ============================================================ -->
    <header class="site-header border-bottom bg-white sticky-top">
      <div class="container-xl">
        <!-- Row 1 (mobile, <lg): logo + menu toggler only — everything else
           (search, city, currency, account, nav links) lives in the
           off-canvas menu below.
           Row 1 (desktop, lg+): logo, search, city, currency/language,
           account, in that reading order (right to left). No flex `order`
           utilities: DOM order is the visual order, matching how dir="rtl"
           naturally flows (first child = right edge). -->
        <div class="d-flex align-items-center py-3 flex-wrap header-row-1">
          <!-- Logo -->
          <a
            href="index.html"
            class="site-logo d-flex align-items-center gap-2 text-decoration-none flex-shrink-0"
          >
            <img
              src="{{ asset('front/assets/icons/logo-mark.svg') }}"
              alt="تيكت فلو"
              width="36"
              height="36"
            />
            <span class="site-logo-text">تيكت فلو</span>
          </a>

          <!-- Mobile menu toggler: opens the off-canvas menu -->
          <button
            type="button"
            class="header-menu-toggle d-lg-none ms-auto"
            data-bs-toggle="offcanvas"
            data-bs-target="#mobileMenu"
            aria-controls="mobileMenu"
            aria-label="فتح القائمة"
          >
            <i class="bi bi-list"></i>
          </button>

          <!-- Desktop-only: search, city, currency/language, account -->
          <div class="header-actions d-none d-lg-flex align-items-center">
            <!-- Search: sits right next to the logo, fixed pill width -->
            <div class="header-search-wrap flex-shrink-0">
              <form class="header-search w-100" role="search">
                <div class="input-group">
                  <input
                    type="search"
                    class="form-control"
                    placeholder="البحث عن الفعالية أو الفئة"
                    aria-label="البحث عن الفعالية أو الفئة"
                  />
                  <span class="input-group-text">
                    <i class="bi bi-calendar3 text-muted"></i>
                  </span>
                </div>
              </form>
            </div>

            <!-- City indicator: icon first (rightmost), label after — plain text, no dropdown -->
            <div
              class="header-city flex-shrink-0 d-flex align-items-center gap-1"
            >
              <img
                src="{{ asset('front/assets/icons/icon-geo-mark.svg') }}"
                alt=""
                width="10"
                height="14"
              />
              <span>جدة</span>
            </div>

            <!-- Currency / language -->
            <div class="dropdown flex-shrink-0 ms-auto">
              <button
                class="btn btn-link text-body text-decoration-none px-2 d-flex align-items-center gap-1"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="{{ asset('front/assets/icons/icon-globe.svg') }}"
                  alt=""
                  width="16"
                  height="16"
                />
                <span class="small text-muted">AR</span>
                <img
                  src="{{ asset('front/assets/icons/icon-divider.svg') }}"
                  alt=""
                  width="4"
                  height="11"
                  class="mx-1"
                />
                <span class="small text-muted">USD</span>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">USD - دولار أمريكي</a>
                </li>
                <li><a class="dropdown-item" href="#">SAR - ريال سعودي</a></li>
              </ul>
            </div>

            <!-- Account menu -->
            <div class="flex-shrink-0">
              <button
                type="button"
                class="btn btn-account p-0 rounded-circle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                aria-label="حساب المستخدم"
              >
                <img
                  src="{{ asset('front/assets/icons/avatar-default.svg') }}"
                  alt=""
                  width="14"
                  height="17"
                />
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">تسجيل الدخول</a></li>
                <li><a class="dropdown-item" href="#">إنشاء حساب</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Row 2: primary navigation (desktop only, lg+) -->
        <nav class="navbar navbar-expand-lg py-0 d-none d-lg-block">
          <ul class="navbar-nav gap-lg-4">
            <li class="nav-item">
              <a
                class="nav-link fw-semibold d-flex align-items-center gap-2"
                href="#"
              >
                انضم لنا
                <span class="badge-plus">Plus</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link fw-semibold dropdown-toggle"
                href="#"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >الفعاليات</a
              >
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="events.html">جميع الفعاليات</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">الفعاليات القادمة</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link fw-semibold dropdown-toggle"
                href="#"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >المغامرات والتجارب</a
              >
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">رحلات السفاري</a></li>
                <li>
                  <a class="dropdown-item" href="#">أنشطة الهواء الطلق</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="#"
                >كأس العالم للرياضات الإلكترونية</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="#">موسم عسير</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="#">العروض الكوميدية</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="#">ما الجديد في جدة؟</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>




        <!-- ============================================================
       MOBILE MENU (off-canvas, <lg)
       Slides in from the left over a dimmed overlay; holds everything
       that's hidden from row 1 / row 2 on small screens.
       ============================================================ -->
    <div
      class="offcanvas offcanvas-end mobile-menu"
      tabindex="-1"
      id="mobileMenu"
      aria-labelledby="mobileMenuLabel"
    >
      <div class="offcanvas-header border-bottom">
        <a
          href="index.html"
          class="site-logo d-flex align-items-center gap-2 text-decoration-none"
          id="mobileMenuLabel"
        >
          <img
            src="{{ asset('front/assets/icons/logo-mark.svg') }}"
            alt="تيكت فلو"
            width="32"
            height="32"
          />
          <span class="site-logo-text">تيكت فلو</span>
        </a>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="إغلاق"
        ></button>
      </div>
      <div class="offcanvas-body d-flex flex-column">
        <form class="header-search w-100 mb-4" role="search">
          <div class="input-group">
            <input
              type="search"
              class="form-control"
              placeholder="البحث عن الفعالية أو الفئة"
              aria-label="البحث عن الفعالية أو الفئة"
            />
            <span class="input-group-text">
              <i class="bi bi-calendar3 text-muted"></i>
            </span>
          </div>
        </form>

        <div class="d-flex align-items-center gap-2 mb-4 pb-4 border-bottom">
          <div class="btn-account rounded-circle d-flex" aria-hidden="true">
            <img
              src="{{ asset('front/assets/icons/avatar-default.svg') }}"
              alt=""
              width="14"
              height="17"
            />
          </div>
          <a href="#" class="fw-semibold text-decoration-none">تسجيل الدخول</a>
          <span class="text-muted">/</span>
          <a href="#" class="fw-semibold text-decoration-none">إنشاء حساب</a>
        </div>

        <div
          class="d-flex align-items-center justify-content-between mb-4 pb-4 border-bottom"
        >
          <div class="header-city d-flex align-items-center gap-1">
            <img
              src="{{ asset('front/assets/icons/icon-geo-mark.svg') }}"
              alt=""
              width="10"
              height="14"
            />
            <span>جدة</span>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-link text-body text-decoration-none px-2 d-flex align-items-center gap-1"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="{{ asset('front/assets/icons/icon-globe.svg') }}"
                alt=""
                width="16"
                height="16"
              />
              <span class="small text-muted">AR</span>
              <img
                src="{{ asset('front/assets/icons/icon-divider.svg') }}"
                alt=""
                width="4"
                height="11"
                class="mx-1"
              />
              <span class="small text-muted">USD</span>
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">USD - دولار أمريكي</a>
              </li>
              <li><a class="dropdown-item" href="#">SAR - ريال سعودي</a></li>
            </ul>
          </div>
        </div>

        <ul class="navbar-nav gap-1">
          <li class="nav-item">
            <a
              class="nav-link fw-semibold d-flex align-items-center gap-2"
              href="#"
            >
              انضم لنا
              <span class="badge-plus">Plus</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link fw-semibold d-flex align-items-center justify-content-between"
              href="#"
              data-bs-toggle="collapse"
              data-bs-target="#mobileEventsSub"
              aria-expanded="false"
              aria-controls="mobileEventsSub"
            >
              الفعاليات
              <i class="bi bi-chevron-down small"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="mobileEventsSub">
              <li><a class="nav-link" href="events.html">جميع الفعاليات</a></li>
              <li><a class="nav-link" href="#">الفعاليات القادمة</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a
              class="nav-link fw-semibold d-flex align-items-center justify-content-between"
              href="#"
              data-bs-toggle="collapse"
              data-bs-target="#mobileAdventuresSub"
              aria-expanded="false"
              aria-controls="mobileAdventuresSub"
            >
              المغامرات والتجارب
              <i class="bi bi-chevron-down small"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="mobileAdventuresSub">
              <li><a class="nav-link" href="#">رحلات السفاري</a></li>
              <li><a class="nav-link" href="#">أنشطة الهواء الطلق</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#"
              >كأس العالم للرياضات الإلكترونية</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#">موسم عسير</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#">العروض الكوميدية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#">ما الجديد في جدة؟</a>
          </li>
        </ul>
      </div>
    </div>
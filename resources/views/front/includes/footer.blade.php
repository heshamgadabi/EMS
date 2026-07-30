    <!-- ============================================================
       FOOTER
       ============================================================ -->
    <footer class="site-footer border-top">
      <div class="container-xl py-5">
        <div
          class="d-flex justify-content-between align-items-start flex-wrap gap-4 pb-5 border-bottom"
        >
          <div class="text-lg-start">
            <a
              href="index.html"
              class="site-logo d-flex align-items-center gap-2 justify-content-lg-start text-decoration-none mb-2"
            >
              <img
                src="{{ asset('front/assets/icons/footer-logo-mark.svg') }}"
                alt=""
                width="40"
                height="40"
              />
              <span class="site-logo-text">تيكت فلو</span>
            </a>
            <p class="text-muted small mb-0">
              منصة اكتشاف وتسويق المحتوى الترفيهي
            </p>
          </div>

          <div class="d-flex gap-3 footer-social">
            <a href="#" aria-label="Telegram"
              ><img
                src="{{ asset('front/assets/icons/social-telegram.svg') }}"
                alt=""
                width="16"
                height="16"
            /></a>
            <a href="#" aria-label="X (Twitter)"
              ><img
                src="{{ asset('front/assets/icons/social-x.svg') }}"
                alt=""
                width="16"
                height="16"
            /></a>
            <a href="#" aria-label="Facebook"
              ><img
                src="{{ asset('front/assets/icons/social-facebook.svg') }}"
                alt=""
                width="16"
                height="16"
            /></a>
            <a href="#" aria-label="Instagram"
              ><img
                src="{{ asset('front/assets/icons/social-instagram.svg') }}"
                alt=""
                width="16"
                height="16"
            /></a>
          </div>
        </div>

        <div class="row g-4 pt-5">
          <div class="col-6 col-lg-3">
            <h5 class="footer-heading">الفئات</h5>
            <ul class="footer-list">
              <li><a href="#">أبرز الفعاليات</a></li>
              <li><a href="#">المعالم السياحية المميزة</a></li>
              <li><a href="#">دليل الفعاليات العربية</a></li>
              <li><a href="#">الحفلات الموسيقية</a></li>
              <li><a href="#">الحفلات العربية</a></li>
              <li><a href="#">أنشطة في الهواء الطلق</a></li>
              <li><a href="#">اظهار الكل</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h5 class="footer-heading">من نحن</h5>
            <ul class="footer-list">
              <li><a href="#">انضم لفريقنا</a></li>
              <li><a href="#">الشعار</a></li>
              <li><a href="#">مدونة تيكت فلو</a></li>
              <li><a href="#">آخر الأخبار</a></li>
              <li><a href="#">الشروط والأحكام</a></li>
              <li><a href="#">مركز المساعدة</a></li>
              <li><a href="#">خريطة الموقع</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h5 class="footer-heading">للمنظمين</h5>
            <ul class="footer-list">
              <li><a href="#">نظرة عامة</a></li>
              <li><a href="#">بيع التذاكر في المملكة العربية السعودية</a></li>
              <li><a href="#">الفعاليات الترفيهية</a></li>
              <li><a href="#">المغامرات والتجارب الاستثنائية</a></li>
              <li><a href="#">فعاليات قطاع الأعمال</a></li>
              <li><a href="#">الأنشطة والأحداث الرياضية</a></li>
              <li><a href="#">حلول تذاكر أماكن الفعاليات</a></li>
              <li><a href="#">مميزات التذاكر</a></li>
              <li><a href="#">دليل المنظمين</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h5 class="footer-heading">الخدمات</h5>
            <ul class="footer-list">
              <li><a href="#">خدمات إدارة الفعاليات</a></li>
              <li><a href="#">خدمات التسويق</a></li>
              <li><a href="#">فريق إدارة التذاكر للفعالية</a></li>
              <li><a href="#">طباعة التذاكر</a></li>
              <li><a href="#">خدمة إصدار الترخيص بشكل سريع</a></li>
            </ul>
            <a
              href="#"
              class="btn btn-outline-dark btn-sm rounded-3 mt-2 fw-bold"
              >إضافة فعالية</a
            >
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap 5 JS bundle (includes Popper) -->
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
  </body>
</html>
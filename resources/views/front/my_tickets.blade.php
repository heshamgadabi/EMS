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
                href="profile.html"
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
              <a href="{{ route('my.tickets') }}" class="profile-menu-item active">
                <i class="bi bi-ticket-perforated"></i>
                تذاكري
              </a>
              
              <a href="#" class="profile-menu-item">
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
                <a href="#" class="profile-tab active" data-tab="info" role="tab" aria-selected="true" >معلوماتي</a>
                
                <a href="#" class="profile-tab"  data-tab="password" role="tab" aria-selected="false" >كلمة المرور </a>
                <a href="#" class="profile-tab" data-tab="billing" role="tab" aria-selected="false" >الخطط والفواتير</a>
              </div>

              <!-- معلوماتي -->
              <form class="profile-fields active" data-panel="info">
                <!-- Full name -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profileName">
                    <span>الاسم بالكامل</span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input
                      type="text"
                      id="profileName"
                      class="profile-field-input"
                      value="{{ $user->name }}"
                    />
                  </div>
                </div>

                
                <!-- Phone number: intl-tel-input (see js/main.js initProfilePhoneInput) -->
                <!--div class="profile-field">
                  <label class="profile-field-label" for="profilePhone">
                    <span>رقم الهاتف</span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-tel-wrap" dir="ltr">
                    <input
                      type="tel"
                      id="profilePhone"
                      class="profile-field-tel"
                      value="{{ $user->phone }}"
                    />
                  </div>
                </div-->

                <!-- Current email (read-only) -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profileEmail">
                    <span>البريد الالكتروني </span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input
                      type="email"
                      id="profileEmail"
                      class="profile-field-input"
                      value="{{ $user->email }}"
                      disabled
                    />
                  </div>
                  <p class="profile-field-hint">
                    لا يمكن إجراء تعديلات على البريد الإلكتروني. للمزيد من
                    المعلومات، يرجى التواصل مع فريق الدعم
                  </p>
                </div>

                
                
                <button type="submit" class="profile-save-btn">
                  حفظ التغييرات
                </button>
              </form>

              
              
              <!-- كلمة المرور -->
              <form class="profile-fields" data-panel="password">
                <div class="profile-field">
                  <label class="profile-field-label" for="currentPassword">
                    <span>كلمة المرور الحالية</span>
                  </label>
                  <div class="profile-field-control">
                    <input
                      type="password"
                      id="currentPassword"
                      class="profile-field-input"
                      placeholder="••••••••"
                    />
                  </div>
                </div>
                <div class="profile-field">
                  <label class="profile-field-label" for="newPassword">
                    <span>كلمة المرور الجديدة</span>
                  </label>
                  <div class="profile-field-control">
                    <input
                      type="password"
                      id="newPassword"
                      class="profile-field-input"
                      placeholder="••••••••"
                    />
                  </div>
                </div>
                <div class="profile-field">
                  <label class="profile-field-label" for="confirmPassword">
                    <span>تأكيد كلمة المرور الجديدة</span>
                  </label>
                  <div class="profile-field-control">
                    <input
                      type="password"
                      id="confirmPassword"
                      class="profile-field-input"
                      placeholder="••••••••"
                    />
                  </div>
                </div>
                <button type="submit" class="profile-save-btn">
                  تحديث كلمة المرور
                </button>
              </form>

              <!-- الخطط والفواتير -->
              <div class="profile-fields" data-panel="billing">
                <div class="profile-billing-card">
                  <div>
                    <p class="profile-billing-plan-label">خطتك الحالية</p>
                    <p class="profile-billing-plan-name">العضوية الأساسية</p>
                  </div>
                  <button type="button" class="profile-save-btn">
                    ترقية الخطة
                  </button>
                </div>
                <p class="profile-field-hint">
                  لا توجد فواتير سابقة لعرضها حتى الآن
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>


@endsection
@extends('front.layout.app')

@section('title')
  عضوية جديدة | تيكت فلو
@endsection


@section('content')

<main>
     
  <div class="container">
     <div class="row">
      
     <div class="col-md-2"></div> 

     <div class="col-md-8">
     <!-- ============================================================
         PROFILE PAGE
         Figma: node 6:67 "user-profile-page"
         Sidebar (profile card / wallet / account menu) is first in the DOM
         so it lands on the right edge under dir="rtl" (no order utilities),
         matching the main nav/footer convention on this site; the form
         card follows and lands on the left.
         ============================================================ -->
      <section class="container-xl profile-page-section">
        <h1 class="profile-page-title">تسجيل عضوية جديدة</h1>

        <div class="profile-columns">
          <!-- Sidebar: avatar, membership badge, wallet, account menu -->
          
          
          <!-- Main: tabbed form card -->
          <div class="profile-main">
            <div class="profile-card">
              <div class="profile-tabs" role="tablist">
                <a href="#" class="profile-tab active" data-tab="info" role="tab" aria-selected="true" >معلوماتي</a>
                
                <a href="#" class="profile-tab"  data-tab="notifications" role="tab" aria-selected="false" >تسجيل الدخول</a>
                
                <a href="#" class="profile-tab" data-tab="password" role="tab" aria-selected="false">استعادة كلمة المرور</a>
                

              </div>

              <!-- معلوماتي -->
              <form action="{{ route('user.signup.store') }}" method="POST" class="profile-fields active" data-panel="info">
                @csrf

                <!-- Full name -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profileName">
                    <span>الاسم بالكامل</span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input type="text" name="name" value="{{ old('name') }}" id="profileName" class="profile-field-input" />
                  </div>

                   @error('name')
                     <p class="profile-field-required" >{{ $message }}</p>
                   @enderror


                </div>

               

                

                

                <!-- Current email (read-only) -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profileEmail">
                    <span>البريد الالكتروني </span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input type="email" value="{{ old('email') }}" name="email" id="profileEmail" class="profile-field-input"  />
                  </div>
                  <p class="profile-field-hint">
                    لا يمكن إجراء تعديلات على البريد الإلكتروني. للمزيد من
                    المعلومات، يرجى التواصل مع فريق الدعم
                  </p>
                  @error('email')
                     <p class="profile-field-required" >{{ $message }}</p>
                   @enderror
                </div>

                
                <!-- password -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profilePassword">
                    <span>كلمة المرور</span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input type="password" value="{{ old('password') }}" name="password" id="profilePassword" class="profile-field-input" />
                  </div>
                  @error('password')
                     <p class="profile-field-required" >{{ $message }}</p>
                   @enderror
                </div>

                <!-- repeat password -->
                <div class="profile-field">
                  <label class="profile-field-label" for="profileRepeatPassword">
                    <span>تأكيد كلمة المرور</span>
                    <span class="profile-field-required">*</span>
                  </label>
                  <div class="profile-field-control">
                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="profileRepeatPassword" class="profile-field-input"  />
                  </div>
                  @error('password_confirmation')
                     <p class="profile-field-required" >{{ $message }}</p>
                   @enderror
                </div>


                <button type="submit" class="profile-save-btn">
                تسجيل
                </button>
              </form>

              <!-- الإشعارات -->
              <div class="profile-fields" data-panel="notifications">
                <div class="profile-switch-row">
                  <label class="profile-switch-label" for="notifyEmail"
                    >إشعارات البريد الإلكتروني</label
                  >
                  <div class="form-check form-switch mb-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      role="switch"
                      id="notifyEmail"
                      checked
                    />
                  </div>
                </div>
                <div class="profile-switch-row">
                  <label class="profile-switch-label" for="notifySms"
                    >إشعارات الرسائل النصية</label
                  >
                  <div class="form-check form-switch mb-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      role="switch"
                      id="notifySms"
                    />
                  </div>
                </div>
                <div class="profile-switch-row">
                  <label class="profile-switch-label" for="notifyOffers"
                    >العروض والتخفيضات</label
                  >
                  <div class="form-check form-switch mb-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      role="switch"
                      id="notifyOffers"
                      checked
                    />
                  </div>
                </div>
                <button type="button" class="profile-save-btn">
                  حفظ وتسجيل
                </button>
              </div>

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
    
    </div>

    </div>
  </div>  
    
</main> 
    


  

@endsection
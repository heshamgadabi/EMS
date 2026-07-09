@include('admin.includes.header1')
 
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      
      @include('admin.includes.header_nav')
      
      @include('admin.includes.sidebar')
      
      <!--begin::App Main-->
      <main class="app-main">
        
        @yield('breadcrumb')
         
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          
          <div class="app-content">
            <!--begin::Container-->
                <div class="container-fluid">
                  <!--begin::Row-->
                      <div class="row">
                          
                          @yield('content')
                          
                      </div>
                </div>
          </div>





          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
            <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2026&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    
@include('admin.includes.footer1')
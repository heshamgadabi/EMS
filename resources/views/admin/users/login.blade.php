@extends('admin.layout.app')

@section('title')
    Login
@endsection

@section('content')

<div class="col-md-10">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">User Login</div>
    </div>

   


   <form method="POST" action="{{ route('user.authenticate') }}" >
    @csrf
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" />
               

              @error('email')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            
            <div class="mb-3">
              <label for="email" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" />
               

              @error('password')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            


            
            
          </div>
        </div>
        
        

    
    </div>
   






    
    <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>

  </div>
</div>


@endsection



@section('breadcrumb')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Login</h3>
              </div>
              <div class="col-sm-6">
                 
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection



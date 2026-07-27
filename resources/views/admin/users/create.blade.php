@extends('admin.layout.app')

@section('title')
    Create User
@endsection

@section('content')

<div class="col-md-10">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">User Details</div>
    </div>

   


   <form method="POST" action="{{ route('user.store') }}" >
    @csrf
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="name" class="form-label">User Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" aria-describedby="nameHelp" />
               

              @error('name')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
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
            


            <div class="mb-3">
              <label for="role" class="form-label">Permission</label>
              
              <select class="form-select" name="role" id="role" aria-label="Role">
                <option value="" selected>Select Role</option>
                <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Normal User</option>
                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="supervisor" {{ old('role') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
              </select>
              
              @error('role')
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
                <h3 class="mb-0">Create User</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users List</a></li>
                  <li class="breadcrumb-item"><a href=""></a></li>

                  <li class="breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection



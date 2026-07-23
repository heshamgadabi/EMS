@extends('admin.layout.app')

@section('title')
    Edit {{ $user->name }}
@endsection

@section('content')

<div class="col-md-10">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">User Details</div>
    </div>

   


   <form method="POST" action="{{ route('user.update', $user->id) }}" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="title" class="form-label">User Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" id="title" aria-describedby="titleHelp" />
               

              @error('name')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            <div class="mb-3">
              <label for="price" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" id="price" aria-describedby="priceHelp" />
               

              @error('email')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            

            <div class="mb-3">
              <label for="status" class="form-label">Permission</label>
              
              <select class="form-select" name="role" id="role" aria-label="ٍُEvent Status">
                <option value="" selected>Select Role</option>
                <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Normal User</option>
                <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="supervisor" {{ old('role', $user->role) == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
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
                <h3 class="mb-0">Edit {{ $user->name }}</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users List</a></li>
                  <li class="breadcrumb-item"><a href=""></a></li>

                  <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection



@extends('admin.layout.app')

@section('title')
    EMS ‘Users admin Dashboard
@endsection


@section('content')
<div class="col-md-10">

  @if(session('success'))
    
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif

  
  
  <div class="clearfix"></div>
   



    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">Users List</h3>
      </div>
    
      
      
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">ID</th>
              <th>Name</th>
              <th>Email</th>
              <th width="150">Settings</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($users as $user)
            <tr class="align-middle">
              <td>{{ $user->id }}.</td>
              <td>
                <a href=""  class="text-decoration-none">{{ $user->name }}</a>  
              </td>
              <td>
                 {{ $user->email }}
              </td>
              <td>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                
                
                
                
              </td>
            </tr>
            @endforeach
           
            
            
          </tbody>
        </table>
      </div>
     

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
                <h3 class="mb-0">Users</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection
@extends('admin.layout.app')

@section('title')
    EMS Admin Dashboard
@endsection

@section('content')
<div class="col-md-10">

  @if(session('success'))
    
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif

  
  
  <a href="{{ route('event.create') }}" class="btn btn-secondary mb-3 float-end" >Add Event</a>

  <div class="clearfix"></div>
   



    <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">Events List</h3>
      </div>
    
      
      
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">ID</th>
              <th>Title</th>
              <th>Total registered</th>
              <th width="150">Settings</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($events as $event)
            <tr class="align-middle">
              <td>{{ $event->id }}.</td>
              <td>
                <a href="{{ route('event.admin', $event->id) }}"  class="text-decoration-none">{{ $event->title }}</a>  
              </td>
              <td>
                 
              </td>
              <td>
                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>

                <a href="{{ route('event.admin', $event->id) }}"   class="text-decoration-none me-2"><i class="nav-icon bi bi-gear"></i></a>

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
                <h3 class="mb-0">Events</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('event.list') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Events</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection
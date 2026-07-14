@extends('admin.layout.app')

@section('title')
    Create Event
@endsection

@section('content')

<div class="col-md-11">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">Event Details</div>
    </div>

   


   <form method="POST" action="{{ route('event.store') }}" >
    @csrf
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="title" class="form-label">Event Title</label>
              <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" aria-describedby="titleHelp" />
               

              @error('title')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            <div class="mb-3">
              <label for="start_date" class="form-label">Start Date</label>
              <input type="datetime-local" name="start_time" value="{{ old('start_time') }}" class="form-control" id="start_time" aria-describedby="start_dateHelp" />

              @error('start_time')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

              
            </div>
            <div class="mb-3">
              <label for="end_date" class="form-label">End Date</label>
              <input type="datetime-local" name="end_time" value="{{ old('end_time') }}" class="form-control" id="end_time" aria-describedby="end_dateHelp" />
              
              @error('end_time')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror


            </div>

            <div class="mb-3">
              <label for="location" class="form-label">Status</label>
              
              <select class="form-select" name="status" id="status" aria-label="ٍُEvent Status">
                <option value="" selected>Select Status</option>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>   
              </select>
              
              @error('status')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror


            </div>






            
            
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="card-body">
            

            <div class="mb-3">
              <label for="description" class="form-label">Event Description</label>
              <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
             
              @error('description')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>

            <div class="mb-3">
              <label for="location" class="form-label">Event Location</label>
              <textarea class="form-control" name="location" id="location" rows="3">{{ old('location') }}</textarea>
              @error('location')
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
                <h3 class="mb-0">Create Event</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('event.list') }}">Event List</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Event</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection
@extends('admin.layout.app')

@section('title')
    Edit {{ $ticket->title }}
@endsection

@section('content')

<div class="col-md-10">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">Ticket Details</div>
    </div>

   


   <form method="POST" action="{{ route('event.ticket.update', $ticket->id) }}" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="title" class="form-label">Ticket Title</label>
              <input type="text" name="title" class="form-control" value="{{ old('title', $ticket->title) }}" id="title" aria-describedby="titleHelp" />
               

              @error('title')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            <div class="mb-3">
              <label for="price" class="form-label">Ticket Price</label>
              <input type="decimal" name="price" class="form-control" value="{{ old('price', $ticket->price) }}" id="price" aria-describedby="priceHelp" />
               

              @error('price')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            

            <div class="mb-3">
              <label for="location" class="form-label">Status</label>
              
              <select class="form-select" name="status" id="status" aria-label="ٍُEvent Status">
                <option value="" selected>Select Status</option>
                <option value="1" {{ old('status', $ticket->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $ticket->status) == '0' ? 'selected' : '' }}>Inactive</option>   
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
              <label for="description" class="form-label">Ticket Description</label>
              <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $ticket->description) }}</textarea>
             
              @error('description')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>

            <div class="mb-3">
              <label for="location" class="form-label">Ticket Location</label>
              <textarea class="form-control" name="location" id="location" rows="3">{{ old('location', $ticket->location) }}</textarea>
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
                <h3 class="mb-0">Edit {{ $ticket->title }}</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('event.list') }}">Event List</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('event.admin', $event->id) }}">{{ $event->title }}</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Edit Ticket</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection



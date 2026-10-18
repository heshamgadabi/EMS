@extends('admin.layout.app')

@section('title')
    
EMS Admin Dashboard | @if(isset($category)) {{ $category->name }} @else Create Category @endif
@endsection

@section('content')




<div class="col-md-10">
  <div class="card card-secondary card-outline mb-4">
    <div class="card-header">
      <div class="card-title">Ticket Details</div>
    </div>

   


   <form method="POST" action="@if(isset($category) && $type == 'edit') {{ route('category.update', $category->id) }} @else {{ route('category.store') }} @endif" >
    @csrf
    @if(isset($category))
      @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-6">
          <div class="card-body">

            <div class="mb-3">
              <label for="title" class="form-label">Category Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', isset($category) ? $category->name : '') }}" id="title" aria-describedby="titleHelp" />
               

              @error('name')
                  <div class="invalid-feedback d-block" >{{ $message }}</div>
              @enderror

            </div>
            
            
            

            <div class="mb-3">
              <label for="location" class="form-label">Status</label>
              
              <select class="form-select" name="status" id="status" aria-label="ٍُEvent Status">
                <option value="" selected>Select Status</option>
                <option value="1" {{ old('status', isset($category) ? $category->status : '') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', isset($category) ? $category->status : '') == '0' ? 'selected' : '' }}>Inactive</option>   
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
              <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', isset($category) ? $category->description : '' ) }}</textarea>
             
              @error('description')
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
                <h3 class="mb-0">Create Category</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection

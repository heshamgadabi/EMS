@extends('admin.layout.app')

@section('title')
    {{ $event->title }} Dashboard
@endsection

@section('content')




<!-- Tabbed content -->
<div class="col-md-12">

  @if(session('success'))
    
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif
  
  <div class="card">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="profile-tabs" role="tablist">
        <li class="nav-item" role="Overview">
          <a href="{{ route('event.admin.overview', $event->id) }}" class="nav-link">
            Overview
          </a>
        </li> 
       
      
        <li class="nav-item" role="presentation">
          <a href="{{ route('event.admin', $event->id) }}" class="nav-link">
            Tickets
          </a>
        </li>
        <li class="nav-item" role="presentation">
           
           <a href="{{ route('event.admin', $event->id) }}" class="nav-link">
            Registrations
          </a>
        
        </li>
        <li class="nav-item" role="presentation">
             
            <a href="{{ route('event.admin', $event->id) }}" class="nav-link">
                Financial
            </a>
        
        </li>
        <li class="nav-item" role="presentation">
          <a href="{{ route('event.pictures', $event->id) }}" class="nav-link active">
            Pictures
          </a>  
        </li>

      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <!-- Activity tab -->
        <div class="tab-pane fade show active">

            <div class="col-md-3">
                  
                <form action="{{ route('event.pictures.store', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                  <div class="mb-3">
                    <label for="type" class="form-label">Picture Type</label>
                    
                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="">Select Picture Type</option>
                        <option value="Banner" {{ old('type') == 'Banner' ? 'selected' : '' }}>Banner</option>
                        <option value="Thumbnail" {{ old('type') == 'Thumbnail' ? 'selected' : '' }}>Thumbnail</option>  
                        <option value="Gallery" {{ old('type') == 'Gallery' ? 'selected' : '' }}>Gallery</option>

                    </select>
                    

                    @error('type')
                        <div class="invalid-feedback d-block" >{{ $message }}</div>
                    @enderror

                  </div>


                  <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                  @error('picture')
                      <div class="invalid-feedback d-block" >{{ $message }}</div> 
                  @enderror
                  <button type="submit" class="btn btn-primary mt-3">Upload</button>
                </form>



                  
            </div>
         
          
        </div>

        <div class="clearfix"></div>
        <div class="row mt-4">
            @foreach($photos as $photo)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $photo->path) }}" style="height: 200px; object-fit: cover;" class="card-img-top" alt="{{ $photo->type }}">
                        <div class="card-body col-md-12" >
                            <h5 class="card-title">{{ $photo->type }}</h5>
                            <form action="{{ route('event.pictures.destroy', [$event->id, $photo->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this picture?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
      
        

         
      </div>
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
                <h3 class="mb-0">{{ $event->title }}</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('event.list') }}">Home</a></li>
                  <li class="breadcrumb-item " aria-current="page"><a href="{{ route('event.list') }}"> Events </a> </li>
                  <li class="breadcrumb-item active" aria-current="page"> {{ $event->title }}</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection
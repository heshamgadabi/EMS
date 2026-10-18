@extends('admin.layout.app')

@section('title')
    EMS Admin Dashboard | Categories
@endsection

@section('content')
<div class="col-md-10">

  @if(session('success'))
    
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif


  <a href="{{ route('category.create') }}" class="btn btn-secondary mb-3 float-end" >Add Category</a>

  <div class="clearfix"></div>


  <div class="card mb-4">
      <div class="card-header">
        <h3 class="card-title">Categories List</h3>
      </div>
    
      
      
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">ID</th>
              <th>Category Name</th>
              <th>Status</th>
              <th width="150">Settings</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($categories as $category)
            <tr class="align-middle">
              <td>{{ $category->id }}.</td>
              <td>
                <a href="{{ route('category.edit', $category->id) }}"  class="text-decoration-none">{{ $category->name }}</a>  
              </td>
              <td>
                <span class="badge bg-{{ $category->status == 1 ? 'success' : 'danger' }}">
                  {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                </span>
              </td>
              <td>
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>


                
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
                <h3 class="mb-0">Categories</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
@endsection
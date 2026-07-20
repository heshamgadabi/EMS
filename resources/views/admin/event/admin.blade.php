@extends('admin.layout.app')

@section('title')
    {{ $event->title }} Dashboard
@endsection

@section('content')




<!-- Tabbed content -->
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="profile-tabs" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link active"
                          id="tickets-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#tickets"
                          type="button"
                          role="tab"
                          aria-selected="true"
                        >
                          Tickets
                        </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="registrations-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#registrations"
                          type="button"
                          role="tab"
                          aria-selected="false"
                        >
                          Registrations
                        </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="financials-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#financials"
                          type="button"
                          role="tab"
                          aria-selected="false"
                        >
                          Financials
                        </button>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <!-- Activity tab -->
                      <div
                        class="tab-pane fade show active"
                        id="tickets"
                        role="tabpanel"
                        aria-labelledby="tickets-tab">

                        <a href="{{ route('event.ticket.create', $event->id) }}" class="btn btn-primary mb-3">Add Ticket</a>
                        

                        tickets
                        
                      </div>

                      <!-- Timeline tab -->
                      <div
                        class="tab-pane fade"
                        id="registrations"
                        role="tabpanel"
                        aria-labelledby="registrations-tab"
                      >
                        registrations
                      </div>

                      <!-- Financials tab -->
                      <div
                        class="tab-pane fade"
                        id="financials"
                        role="tabpanel"
                        aria-labelledby="financials-tab"
                      >
                      
                      financials

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
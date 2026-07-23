@if(!isset($active_page))
  @php $active_page = ''; @endphp
@endif
<!--begin::Sidebar-->
      <aside class="app-sidebar bg-dark-subtle shadow" data-bs-theme="light">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('admin/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">EMS</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item @if(isset($active_page) && ($active_page == 'event_list' || $active_page == 'create_event')) menu-open @endif">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Events
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('event.list') }}" class="nav-link @if(isset($active_page) && $active_page == 'event_list') active @endif">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Events List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('event.create') }}" class="nav-link @if(isset($active_page) && $active_page == 'create_event') active @endif">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add Event</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              

              <li class="nav-item @if(isset($active_page) && $active_page == 'users_list') menu-open @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-people"></i>
                  <p>
                    Users
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>


                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('users.list') }}" class="nav-link @if(isset($active_page) && $active_page == 'users_list') active @endif">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Users List</p>
                    </a>
                  </li>
                </ul>


              </li>


              <li class="nav-header">PAGES</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-file-earmark-text"></i>
                  <p>
                    Pages
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./pages/profile.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Profile</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/settings.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Settings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/invoice.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Invoice</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/calendar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Calendar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/kanban.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Kanban</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/chat.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Chat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/file-manager.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>File Manager</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/projects.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Projects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/pricing.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Pricing</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/faq.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>FAQ</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>
                        Error
                        <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./pages/404.html" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>404</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./pages/500.html" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>500</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./pages/maintenance.html" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Maintenance</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              

              <li class="nav-header">MULTI LEVEL EXAMPLE</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle-fill"></i>
                  <p>Level 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle-fill"></i>
                  <p>
                    Level 1
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>
                        Level 2
                        <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-record-circle-fill"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-record-circle-fill"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-record-circle-fill"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle-fill"></i>
                  <p>Level 1</p>
                </a>
              </li>

              <li class="nav-header">LABELS</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-danger"></i>
                  <p class="text">Important</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-warning"></i>
                  <p>Warning</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-info"></i>
                  <p>Informational</p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->

            <!-- Docs CTA (bottom of sidebar) -->
            <div class="p-3 mt-3 border-top border-secondary border-opacity-25">
              <a
                href="./docs/introduction.html"
                class="btn btn-sm btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2"
              >
                <i class="bi bi-book" aria-hidden="true"></i>
                View documentation
              </a>
            </div>
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
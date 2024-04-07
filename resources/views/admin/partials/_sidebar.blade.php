<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          HUMIS
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          {{-- <li class="nav-item nav-category">Main</li> --}}
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          {{-- <li class="nav-item nav-category"></li> --}}
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bookings" role="button" aria-expanded="false" aria-controls="bookings">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Bookings</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="bookings">
              <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="{{route('create-booking-step-1')}}" class="nav-link">Add Bookings</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('bookings')}}" class="nav-link">Edit Booking</a>
                  </li>
                <li class="nav-item">
                  <a href="{{route('complete-list')}}" class="nav-link">Booking List</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('applications')}}" class="nav-link">Application List</a>
                </li>
                {{-- <li class="nav-item">
                  <a href="{{route('booking-maktab-summary')}}" class="nav-link">Summary</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('booking-maktab-report')}}" class="nav-link">Reports</a>
                </li> --}}
              </ul>
            </div>
          </li>
           @if (Auth::user()->role=="ADMIN")
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#companies" role="button" aria-expanded="false" aria-controls="bookings">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Companies</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="companies">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('companies.create')}}" class="nav-link">Add Company</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('companies.index')}}" class="nav-link">Company List</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#packages" role="button" aria-expanded="false" aria-controls="bookings">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Packages</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="packages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('packages.create')}}" class="nav-link">Add Package</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('packages.index')}}" class="nav-link">Package List</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accounts" role="button" aria-expanded="false" aria-controls="accounts">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Accounts</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="accounts">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('reciepts.index')}}" class="nav-link">Reciepts</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('payments.index')}}" class="nav-link" >Payments</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('bank-cash.index')}}" class="nav-link">Bank/Cash</a>
                </li>
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">Summary</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Reports</a>
                </li> --}}
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#documents" role="button" aria-expanded="false" aria-controls="accounts">
               <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Documents/Aggrements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
             {{-- <a href="#" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Documents/Aggrements</span>
            </a> --}}

            <div class="collapse" id="documents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('maktab-documents')}}" class="nav-link">Maktab</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('makkah-hotel-documents')}}" class="nav-link" >Makkah Hotel</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('madinah-hotel-documents')}}" class="nav-link">Madinah Hotel</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('aziziyah-hotel-documents')}}" class="nav-link">Aziziyah Hotel</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('visa-ticket')}}" class="nav-link">Visa Ticket</a>
                </li>
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">Summary</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Reports</a>
                </li> --}}
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="help-circle"></i>
              <span class="link-title">Help</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Help</span>
            </a>
          </li>
          <li class="nav-item nav-category">Components</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">UI Kit</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/badges.html" class="nav-link">Badges</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/breadcrumbs.html" class="nav-link">Breadcrumbs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/buttons.html" class="nav-link">Buttons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/button-group.html" class="nav-link">Button group</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/cards.html" class="nav-link">Cards</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/carousel.html" class="nav-link">Carousel</a>
                </li>
                <li class="nav-item">
                    <a href="pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                  </li>
                <li class="nav-item">
                  <a href="pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Advanced UI</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                </li>
                <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                  </li>
                <li class="nav-item">
                  <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Forms</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/forms/basic-elements.html" class="nav-link">Basic Elements</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced-elements.html" class="nav-link">Advanced Elements</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Charts</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/charts/apex.html" class="nav-link">Apex</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">ChartJs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">Flot</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/morrisjs.html" class="nav-link">Morris</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/peity.html" class="nav-link">Peity</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/sparkline.html" class="nav-link">Sparkline</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">Table</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/tables/basic-table.html" class="nav-link">Basic Tables</a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data-table.html" class="nav-link">Data Table</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
              <i class="link-icon" data-feather="smile"></i>
              <span class="link-title">Icons</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Pages</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Special pages</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/faq.html" class="nav-link">Faq</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/profile.html" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
              <i class="link-icon" data-feather="unlock"></i>
              <span class="link-title">Authentication</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="authPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/auth/login.html" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                  <a href="pages/auth/register.html" class="nav-link">Register</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="cloud-off"></i>
              <span class="link-title">Error</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="errorPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/error/404.html" class="nav-link">404</a>
                </li>
                <li class="nav-item">
                  <a href="pages/error/500.html" class="nav-link">500</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li> --}}
        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="demo_1/dashboard-one.html">
            <img src="assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="demo_2/dashboard-one.html">
            <img src="assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
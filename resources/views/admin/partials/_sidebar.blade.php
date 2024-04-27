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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            {{-- <li class="nav-item nav-category"></li> --}}
            <li
                class="nav-item {{ request()->route()->getName() == 'bookings' || request()->route()->getName() == 'create-booking-step-1' || request()->route()->getName() == 'create-booking-step-2' || request()->route()->getName() == 'create-booking-step-3' || request()->route()->getName() == 'create-booking-step-4' || request()->route()->getName() == 'view-booking-details' || request()->route()->getName() == 'view-application-details' ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#bookings" role="button" aria-expanded="false"
                    aria-controls="bookings">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Bookings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->route()->getName() == 'bookings' || request()->route()->getName() == 'create-booking-step-1' || request()->route()->getName() == 'create-booking-step-2' || request()->route()->getName() == 'create-booking-step-3' || request()->route()->getName() == 'create-booking-step-4' || request()->route()->getName() == 'view-booking-details' || request()->route()->getName() == 'view-application-details' ? 'show' : '' }}"
                    id="bookings">
                    <ul class="nav sub-menu">
                        <li
                            class="nav-item {{ request()->route()->getName() == 'create-booking-step-1' || request()->route()->getName() == 'create-booking-step-2' || request()->route()->getName() == 'create-booking-step-3' || request()->route()->getName() == 'create-booking-step-4' ? 'active' : '' }}">
                            <a href="{{ route('create-booking-step-1') }}"
                                class="nav-link {{ request()->route()->getName() == 'create-booking-step-1' || request()->route()->getName() == 'create-booking-step-2' || request()->route()->getName() == 'create-booking-step-3' || request()->route()->getName() == 'create-booking-step-4' ? 'active' : '' }}">Add
                                Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings') }}" class="nav-link">Edit Booking</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('complete-list') }}" class="nav-link">Booking List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('applications') }}" class="nav-link">Application List</a>
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
            @if (Auth::user()->role == 'ADMIN')
                <li class="nav-item {{ request()->route()->getName() == 'maktab-categories.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#maktab-categories" role="button"
                        aria-expanded="false" aria-controls="maktab-categories">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Maktab</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'maktab-categories.edit' ? 'show' : '' }}"
                        id="maktab-categories">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('maktab-categories.create') }}" class="nav-link">Add Maktab</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('maktab-categories.index') }}" class="nav-link">Maktab List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'aziziah-accomodations.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#aziziah-accomodations" role="button"
                        aria-expanded="false" aria-controls="aziziah-accomodations">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Aziziah Accomodation</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'aziziah-accomodations.edit' ? 'show' : '' }}"
                        id="aziziah-accomodations">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('aziziah-accomodations.create') }}" class="nav-link">Add Aziziah
                                    Accomodation</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aziziah-accomodations.index') }}" class="nav-link">Aziziah
                                    Accomodation List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'makkah-accomodations.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#makkah-accomodations" role="button"
                        aria-expanded="false" aria-controls="makkah-accomodations">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Makkah Accomodation</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'makkah-accomodations.edit' ? 'show' : '' }}"
                        id="makkah-accomodations">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('makkah-accomodations.create') }}" class="nav-link">Add Makkah
                                    Accomodation</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('makkah-accomodations.index') }}" class="nav-link">Makkah
                                    Accomodation List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'madinah-accomodations.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#madinah-accomodations" role="button"
                        aria-expanded="false" aria-controls="madinah-accomodations">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Madinah Accomodation</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'madinah-accomodations.edit' ? 'show' : '' }}"
                        id="madinah-accomodations">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('madinah-accomodations.create') }}" class="nav-link">Add Madinah
                                    Accomodation</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('madinah-accomodations.index') }}" class="nav-link">Madinah
                                    Accomodation List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'food-types.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#food-types" role="button"
                        aria-expanded="false" aria-controls="food-types">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Food</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'food-types.edit' ? 'show' : '' }}"
                        id="food-types">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('food-types.create') }}" class="nav-link">Add Food</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('food-types.index') }}" class="nav-link">Food List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item {{ request()->route()->getName() == 'special-transports.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#special-transports" role="button"
                        aria-expanded="false" aria-controls="special-transports">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Special Transport</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'special-transports.edit' ? 'show' : '' }}"
                        id="special-transports">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('special-transports.create') }}" class="nav-link">Add Special
                                    Transport</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('special-transports.index') }}" class="nav-link">Special Transport
                                    List</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item  {{ request()->route()->getName() == 'companies.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#companies" role="button"
                        aria-expanded="false" aria-controls="bookings">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Companies</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'companies.edit' ? 'show' : '' }}"
                        id="companies">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('companies.create') }}" class="nav-link">Add Company</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('companies.index') }}" class="nav-link">Company List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'airports.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#airports" role="button"
                        aria-expanded="false" aria-controls="bookings">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Airports</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'airports.edit' ? 'show' : '' }}"
                        id="airports">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('airports.create') }}" class="nav-link">Add Airport</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('airports.index') }}" class="nav-link">Airport List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->route()->getName() == 'tickets.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#tickets" role="button" aria-expanded="false"
                        aria-controls="bookings">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Tickets</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'tickets.edit' ? 'show' : '' }}"
                        id="tickets">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('tickets.create') }}" class="nav-link">Add Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tickets.index') }}" class="nav-link">Ticket List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ request()->route()->getName() == 'packages.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#packages" role="button"
                        aria-expanded="false" aria-controls="bookings">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Packages</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'packages.edit' ? 'show' : '' }}"
                        id="packages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('packages.create') }}" class="nav-link">Add Package</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('packages.index') }}" class="nav-link">Package List</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <li class="nav-item {{ request()->route()->getName() == 'booking-offices.edit' ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#booking-offices" role="button"
                    aria-expanded="false" aria-controls="booking-offices">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Booking Office</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->route()->getName() == 'booking-offices.edit' ? 'show' : '' }}"
                    id="booking-offices">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('booking-offices.create') }}" class="nav-link">Add Booking Office</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('booking-offices.index') }}" class="nav-link">Booking Office List</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ request()->route()->getName() == 'payments.index' || request()->route()->getName() == 'payments.create' || request()->route()->getName() == 'payments.index' || request()->route()->getName() == 'view-reciept-details' || request()->route()->getName() == 'reciepts.create' ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#accounts" role="button" aria-expanded="false"
                    aria-controls="accounts">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Accounts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->route()->getName() == 'payments.index' || request()->route()->getName() == 'payments.create' || request()->route()->getName() == 'view-reciept-details' || request()->route()->getName() == 'reciepts.create' ? 'show' : '' }}"
                    id="accounts">
                    <ul class="nav sub-menu">
                        <li
                            class="nav-item {{ request()->route()->getName() == 'view-reciept-details' || request()->route()->getName() == 'reciepts.create' ? 'active' : '' }}">
                            <a href="{{ route('reciepts.index') }}"
                                class="nav-link {{ request()->route()->getName() == 'view-reciept-details' || request()->route()->getName() == 'reciepts.create' ? 'active' : '' }}">Reciepts</a>
                        </li>
                        <li class="nav-item {{ request()->route()->getName() == 'payments.index' ? 'active' : '' }}">
                            <a href="{{ route('payments.index') }}"
                                class="nav-link {{ request()->route()->getName() == 'payments.index' ? 'active' : '' }}">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bank-cash.index') }}" class="nav-link">Bank/Cash</a>
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
            @if (auth()->user()->role == 'COMPANY')
             <li class="nav-item {{ request()->route()->getName() == 'agents.edit' ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#agents" role="button"
                        aria-expanded="false" aria-controls="bookings">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Agents</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->route()->getName() == 'agents.edit' ? 'show' : '' }}"
                        id="agents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agents.create') }}" class="nav-link">Add Agent</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agents.index') }}" class="nav-link">Agents List</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            @if (auth()->user()->role == 'ADMIN')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#documents" role="button"
                        aria-expanded="false" aria-controls="accounts">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Documents/Aggrements</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="documents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('maktab-documents') }}" class="nav-link">Maktab</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('makkah-hotel-documents') }}" class="nav-link">Makkah Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('madinah-hotel-documents') }}" class="nav-link">Madinah Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aziziyah-hotel-documents') }}" class="nav-link">Aziziyah Hotel</a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{ route('visa-ticket') }}" class="nav-link">Visa Ticket</a>
                        </li> --}}
                            {{-- <li class="nav-item">
                  <a href="#" class="nav-link">Summary</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Reports</a>
                </li> --}}
                        </ul>
                    </div>
                </li>
            @endif

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
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                        value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                        value="sidebar-dark">
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

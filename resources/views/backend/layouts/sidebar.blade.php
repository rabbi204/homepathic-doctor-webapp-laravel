<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('logo.png') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">Homepathic</div>
    </a>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item {{ ( Route::currentRouteName() == 'dashboard' ) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-clinic-medical"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    
    

    <li class="nav-item {{ ( Route::currentRouteName() == 'patient.showForm' ) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('patient.showForm') }}">
            <i class="fas fa-procedures"></i>
            <span>Add New Patient</span>
        </a>
    </li>

    <li class="nav-item {{ ( Route::currentRouteName() == 'patient.all' ) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('patient.all') }}">
            <i class="fas fa-user-md"></i>
            <span>All Patient List</span>
        </a>
    </li>

   


</ul>

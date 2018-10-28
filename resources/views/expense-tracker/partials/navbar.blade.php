<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{!! url('et/dashboard') !!}">
    	ExpenseTracker 
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
	<img src="images/logo-mini.svg" alt="logo"/>
</a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">

    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
  
  <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-text">
            <p class="mb-1 text-black">Subsystems</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{!! url('subsystem-selector') !!}">
            <i class="mdi mdi-collage mr-2 text-success"></i>
            All Subsystems
          </a>
          <a class="dropdown-item" href="{!! url('hl/dashboard') !!}">
            <i class=" mdi mdi-bookmark-check mr-2 text-success"></i>
            Health Log
          </a>
          <a class="dropdown-item" href="{!! url('pb/dashboard') !!}">
            <i class=" mdi mdi-bookmark-check mr-2 text-success"></i>
            Phone Book
          </a>
          <a class="dropdown-item" href="{!! url('lm/dashboard') !!}">
            <i class=" mdi mdi-bookmark-check mr-2 text-success"></i>
            Library Manager
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{!! url('logout') !!}">
            <i class="mdi mdi-logout mr-2 text-primary"></i>
            Signout
          </a>
        </div>
      </li>

      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="{!! url('/et/activity-log') !!}">
          <i class="mdi mdi-cached mr-2 text-success"></i>
            Activity Log
        </a>
      </li> 

      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="{!! url('logout') !!}">
          <i class="mdi mdi-power"></i>
        </a>
      </li>
  
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
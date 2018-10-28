<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile">
      <a href="{!! url('et/user/show/'.Auth::user()->id) !!}" class="nav-link">
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold">{!! Auth::user()->name !!}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{!! url('et/dashboard') !!}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

<!--Accounting Menu-->
<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-menu-accounting" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Accounting</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-timetable  menu-icon"></i>
      </a>
      <div class="collapse" id="ui-menu-accounting">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
        		<a class="nav-link" href="{!! url('et/accounting/create-year') !!}">
        			Create Year
        		</a>
        	</li>
        	<li class="nav-item"> 
        		<a class="nav-link" href="{!! url('et/accounting/create-month') !!}">
        			Create Month
        		</a>
        	</li>
        </ul>
      </div>
    </li>

<!--Income Menu-->
<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-menu-income" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Income</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-credit-card-multiple menu-icon"></i>
      </a>
      <div class="collapse" id="ui-menu-income">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Income Entry
		</a>
	</li>
	<li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Income Sources
		</a>
	</li>
        </ul>
      </div>
    </li>

    <!--Expense Menu-->
<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-menu-expenses" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Expense</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-math-compass menu-icon"></i>
      </a>
      <div class="collapse" id="ui-menu-expenses">
        <ul class="nav flex-column sub-menu">
	<li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Expense Entry
		</a>
	</li>
	<li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Category
		</a>
	</li>
	<li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Titles
		</a>
	</li>
        </ul>
      </div>
    </li>

<!--Accounting Menu-->
<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-menu-ebill" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Electricity Bill</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-flash  menu-icon"></i>
      </a>
      <div class="collapse" id="ui-menu-ebill">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Insert Bill Details
		</a>
	</li>
	<li class="nav-item"> 
		<a class="nav-link" href="pages/ui-features/buttons.html">
			Check Monthwise Details
		</a>
	</li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-title">Reports</span>
        <i class="mdi mdi mdi-file-pdf menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-title">User Profiles</span>
        <i class="mdi mdi mdi-account-key  menu-icon"></i>
      </a>
    </li>

  </ul>
</nav>
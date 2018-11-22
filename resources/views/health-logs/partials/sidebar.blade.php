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
      <a class="nav-link" href="{!! url('hl/dashboard') !!}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

<!--Accounting Menu-->
<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-menu-accounting" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Log Entry</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-file-document menu-icon"></i>
      </a>
      <div class="collapse" id="ui-menu-accounting">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
        		<a class="nav-link" href="{!! url('hl/logs') !!}">
        			Manage Logs
        		</a>
        	</li>
        </ul>
      </div>
    </li>

<!--Income Menu-->
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-menu-income" aria-expanded="false" aria-controls="ui-basic">
      <span class="menu-title">Reports</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-chart-bar menu-icon"></i>
    </a>
    <div class="collapse" id="ui-menu-income">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> 
      		<a class="nav-link" href="pages/ui-features/buttons.html">
      			BP Chart
      		</a>
      	</li>
      	<li class="nav-item"> 
      		<a class="nav-link" href="pages/ui-features/buttons.html">
      			Weight Chart
      		</a>
      	</li>
        <li class="nav-item"> 
          <a class="nav-link" href="pages/ui-features/buttons.html">
            Custom Report
          </a>
        </li>
      </ul>
    </div>
  </li>

  </ul>
</nav>
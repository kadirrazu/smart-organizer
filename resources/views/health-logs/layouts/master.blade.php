<!DOCTYPE html>
<html lang="en">

<head>

  @include('health-logs.partials.header')

  @yield('style')

</head>

<body>
  <div class="container-scroller">
    
	@include('health-logs.partials.navbar')
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      @include('health-logs.partials.sidebar')
	  
      <!-- partial -->
      <div class="main-panel">
        
		    @yield('content')
        <!-- /Main Content -->
		
        @include('health-logs.partials.footer')
		
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('health-logs.partials.footer-scripts')

</body>

</html>
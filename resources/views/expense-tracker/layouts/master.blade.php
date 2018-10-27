<!DOCTYPE html>
<html lang="en">

<head>

  @include('expense-tracker.partials.header')

  @yield('style')

</head>

<body>
  <div class="container-scroller">
    
	@include('expense-tracker.partials.navbar')
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      @include('expense-tracker.partials.sidebar')
	  
      <!-- partial -->
      <div class="main-panel">
        
		    @yield('content')
        <!-- /Main Content -->
		
        @include('expense-tracker.partials.footer')
		
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('expense-tracker.partials.footer-scripts')

</body>

</html>
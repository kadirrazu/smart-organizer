<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SmartOrganizer v1.0</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{!! asset('theme/vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('theme/vendors/css/vendor.bundle.base.css') !!}">
  <!-- endinject {!! asset('theme/') !!} -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{!! asset('theme/css/style.css') !!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('theme/images/favicon-so.png') !!}" />
</head>

<body>
  
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="w-100">
          <div class="login-form-width mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <h3>SmartOrganizer 
					<span class="et-version font-weight-light">v 1.0</span>
				</h3>
              </div>
              <h4>Please select a subsystem:</h4>
  
                <div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{!! url('et/dashboard') !!}">Expense Tracker</a>
                </div>
				
				<div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{!! url('hl/dashboard') !!}">Health Logs</a>
                </div>
				
				<div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{!! url('pb/dashboard') !!}">Phone Book</a>
                </div>
				
				<div class="mt-3">
                  <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{!! url('lm/dashboard') !!}">Library Manager</a>
                </div>
				
				<div class="my-2 text-center mt-20">
                  <a href="{!! url('logout') !!}" class="btn btn-sm auth-link text-black">Logout</a>
                </div>
			  
			  <div class="login-footer-text">
				<span> Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i> by <a href="https://www.kadirrazu.info/" target="_blank">Kadir</a>
			  </div>
			  
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{!! asset('theme/vendors/js/vendor.bundle.base.js') !!}"></script>
  <script src="{!! asset('theme/vendors/js/vendor.bundle.addons.js') !!}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{!! asset('theme/js/off-canvas.js') !!}"></script>
  <script src="{!! asset('theme/js/misc.js') !!}"></script>
  <!-- endinject -->
</body>

</html>


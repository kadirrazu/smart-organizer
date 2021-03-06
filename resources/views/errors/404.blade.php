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
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>SORRY!</h2>
                <h3 class="font-weight-light">The page you’re looking for was not found.</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="{!! url('/') !!}">Back to home</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <div class="login-footer-text">
					<span> Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i> by <a style="color:white; font-weight: bold;" href="https://www.kadirrazu.info/" target="_blank">Kadir</a>
				</div>
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



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
              <h4>Hey There! Let's get started.</h4>
              
              {!! Form::open(array('route' => 'global.login-check', 'files' => false, 'method' => 'POST', 'class' => 'pt-3')) !!}

              @if(Session::has('flash_message'))
                  <p class="login-flash-text text-danger">
                      {{ Session::get('flash_message') }}
                  </p>
              @endif

              @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <ul class="unstyled">
                      @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                </div>
              @endif

                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email or Username" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required="required">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN"/>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember_me">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>

              {!! Form::close() !!}
			  
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


<!-- plugins:js -->
<script src="{!! asset('theme/vendors/js/vendor.bundle.base.js') !!}"></script>
<script src="{!! asset('theme/vendors/js/vendor.bundle.addons.js') !!}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{!! asset('theme/js/off-canvas.js') !!}"></script>
<script src="{!! asset('theme/js/misc.js') !!}"></script>
<!-- endinject -->

<!-- Custom js for this page-->
<script src="{!! asset('js/dashboard.js') !!}"></script>
<!-- End custom js for this page-->

@yield('script')
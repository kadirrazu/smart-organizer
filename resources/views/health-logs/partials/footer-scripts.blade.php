<!-- plugins:js -->
<script src="{!! asset('theme/vendors/js/vendor.bundle.base.js') !!}"></script>
<script src="{!! asset('theme/vendors/js/vendor.bundle.addons.js') !!}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{!! asset('theme/js/off-canvas.js') !!}"></script>
<script src="{!! asset('theme/js/misc.js') !!}"></script>
<!-- endinject -->

<script>
	jQuery(document).ready(function($){
		$('.flash-message').delay(5000).slideUp();
	});
</script>

@yield('script')
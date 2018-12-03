@if( Session::get('flash-msg') == true )
	<div class="flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      @if( Session::has('alert-' . $msg) )

	      	<div class="alert alert-{{ $msg }} alert-dismissible">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				
				<h4>
					@if( Session::has('alert-danger') )
						<i class="icon fa fa-ban"></i> 
					@elseif( Session::has('alert-warning') )
						<i class="icon fa fa-warning"></i>
					@elseif( Session::has('alert-info') )
						<i class="icon fa fa-info"></i>
					@else
						<i class="icon fa fa-check"></i>
					@endif
					
					Alert!
				</h4>
				<p>
					{{ Session::get('alert-' . $msg) }}
				</p>
			</div>
	      @endif
	    @endforeach
  	</div> 
  	
  	<!-- end .flash-message -->

@endif


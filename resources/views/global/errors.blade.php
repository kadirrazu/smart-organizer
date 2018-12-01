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
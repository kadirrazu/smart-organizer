@extends('health-logs.layouts.master')

@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@stop

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-library-plus"></i>                 
        </span>
        Create a New Log
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Create a New Health Record Entry
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              
                <form class="form-sample" method="POST" action="{{ url('hl/logs') }}">
                 
                  @csrf

                  <p class="card-description">
                    Record Date and Time
                  </p>

                  <!-- Row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="log_date" value="{{ date('Y-m-d')}}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Time</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="log_time" value="{{ date('H:i:s')}}"/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Toogle Area : Blood Pressure -->
                  <div class="toggle-div">

                    <p class="card-description">
                      Blood Pressure
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Record Blood Pressure Data
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="log_date" value="{{ date('Y-m-d')}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Time</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="log_time" value="{{ date('H:i:s')}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <hr>

                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  <button type="reset" class="btn btn-light">Cancel</button>

                </form>

            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  
@stop

@section('script')

<script>
  jQuery(document).ready(function($) {

    $('.toggle-div input[type="checkbox"]').on('click', function(e){

      if(this.checked){
        $(this).closest('.toggle-div').children('.toogle-block').removeClass('hidden-block');
      }
      else{
        $(this).closest('.toggle-div').children('.toogle-block').addClass('hidden-block');
      }

    });

  });
</script>

@stop
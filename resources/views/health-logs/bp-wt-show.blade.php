@extends('health-logs.layouts.master')

@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.11/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@stop

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-file-document"></i>                 
        </span>
        Generate Report : BP &amp; Weight
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>BP &amp; Weight Report Generator
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

  <div class="row">
    <div class="col-md-12 mb-btn-set">
        
        <a href="{{ url('hl/custom-report-view') }}" class="btn btn-gradient-primary mr-2">
          Get Customized Report
        </a>

    </div>
  </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            @include('global.flashes')

            @include('global.errors')

            <div class="clearfix">

              <form class="form-inline" action="{{ url('hl/process-bp-wt-report') }}" method="POST">

                    @csrf
                  
                    <label class="sr-only" for="startDateSelector">
                      Start Date
                    </label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="mdi mdi-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control dateSelector" id="startDateSelector" placeholder="Start Date" name="start-date" autocomplete="off" value="{{ old('start-date') }}">
                    </div>
                    <label class="sr-only" for="endDateSelector">
                      End Date
                    </label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="mdi mdi-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control dateSelector" id="endDateSelector" placeholder="End Date" name="end-date" autocomplete="off" value="{{ old('end-date') }}">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mb-2">
                      Generate
                    </button>
                  </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->
  
@stop

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.11/combined/js/gijgo.min.js" type="text/javascript"></script>

<script>
  jQuery(document).ready(function($) {

    $('#startDateSelector').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mm-yyyy',
        showRightIcon: false
    });

    $('#endDateSelector').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mm-yyyy',
        showRightIcon: false
    });

  });
</script>

@stop
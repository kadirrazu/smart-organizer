@extends('health-logs.layouts.master')

@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.11/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@stop

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-file-document"></i>                 
        </span>
        Generate Report : Custom
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Customized Report Generator
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

  <div class="row">
    <div class="col-md-12 mb-btn-set">
        
        <a href="{{ url('hl/bp-wt-report-view') }}" class="btn btn-gradient-primary mr-2">
          Get BP & WT Report
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

              <form action="{{ url('hl/process-custom-report') }}" method="POST">

                    @csrf

                    <div class="row">
                      <p class="card-description">
                        Select Report Date / Range
                      </p>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="form-control form-control-lg" id="dateRangeSelector">
                            <option value="">Select Range</option>
                            <option value="all-date">All</option>
                            <option value="one-month">Last 1 Month</option>
                            <option value="three-month">Last 3 Month</option>
                            <option value="custom-date">Custom Date</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="row" id="range-row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-gradient-primary text-white">
                                    <i class="mdi mdi-calendar"></i>
                                  </span>
                                </div>
                                <div>
                                  <input type="text" class="form-control dateSelector" id="startDateSelector" placeholder="Start Date" name="start-date" autocomplete="off" value="{{ old('start-date') }}">
                                </div>
                              </div>
                           </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-gradient-primary text-white">
                                    <i class="mdi mdi-calendar"></i>
                                  </span>
                                </div>
                                <div>
                                  <input type="text" class="form-control dateSelector" id="endDateSelector" placeholder="End Date" name="end-date" autocomplete="off" value="{{ old('end-date') }}">
                                </div>
                              </div>
                           </div>
                          </div>
                        </div>
                        <!--/Date Range Row - Inner-->
                      </div>

                    </div>
                    <!--/Duration Row-->

                    <div class="row">
                      <p class="card-description">
                        Select Report Elements
                      </p>
                    </div>

                    <div class="row" id="checkboxContainer">

                      <div class="col-md-4">

                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-all" value="1">
                              All Elements
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-bp" value="1">
                              Blood Pressure
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-hr" value="1">
                              Heart Rate
                              <i class="input-helper"></i>
                            </label>
                          </div>

                        </div>

                      </div>
                      <!-- /column -->

                      <div class="col-md-4">

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-wt" value="1">
                              Weight
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-lp" value="1">
                              Lipid Profile
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-bp" value="1">
                              Blood Sugar
                              <i class="input-helper"></i>
                            </label>
                          </div>

                      </div>
                      <!-- /column -->

                      <div class="col-md-4">

                        <div class="form-group">

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-creatinine" value="1">
                              Creatinine
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-cbc" value="1">
                              CBC
                              <i class="input-helper"></i>
                            </label>
                          </div>

                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="e-other" value="1">
                              Others
                              <i class="input-helper"></i>
                            </label>
                          </div>

                        </div>

                      </div>
                      <!-- /column -->

                    </div>

                    <hr>
                  
                    
                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-gradient-primary mb-2" id="generateBtn">
                          Generate
                        </button>

                        <button type="reset" class="btn btn-gradient-primary mb-2">
                          Reset All
                        </button>
                      </div>
                    </div>

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

    $('#range-row').addClass('hidden');

    $("#dateRangeSelector").on('change', function(){
      
      var selected = this.value;

      if( selected == "custom-date" ){
        $('#range-row').removeClass('hidden');
      }
      else
      {
        $('#range-row').addClass('hidden');
      }

    });

    $("#generateBtn").on("click", function(e){

      var selectedDate = $("#dateRangeSelector").find(":selected").val();
      var startDate = $("#startDateSelector").val();
      var endDate = $("#endDateSelector").val();

      if( selectedDate == "" ){
        alert("Please provide your date range first.");
        e.preventDefault();
        return;
      }

      if( selectedDate == "custom-date" && (startDate == "" || endDate == "")){
        alert("You selected a custom range. But start or end date is still empty!");
        e.preventDefault();
        return;
      }

      var numberOfChecked = $('#checkboxContainer input:checkbox:checked').length;

      if( numberOfChecked == 0 ){
        alert("You doesn't checked any report item!");
        e.preventDefault();
        return;
      }

    });

  });
</script>

@stop
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

                  <p class="card-description card-description-custom">
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

                    <p class="card-description card-description-custom">
                      Blood Pressure
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bp" value="1">
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
                          <label class="col-sm-3 col-form-label">Systolic</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="sys" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Diastolic</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="dia" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Heart Rate -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Heart Rate / Pulse
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="hr" value="1">
                            Record Heart Rate
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Heart Rate</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="h_rate" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Weight -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Weight
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="wt" value="1">
                            Record Weight
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Weight</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="weight" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Lipid Profile -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Lipid Profile
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="lp" value="1">
                            Record Lipid Profile / Cholesterol
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cholesterol (Total)</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_total" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">HDL - Cholesterol</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_hdl" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">LDL - Cholesterol</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_ldl" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triglycerides</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_triglycerides" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Blood Sugar -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Blood Sugar
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="bs" value="1">
                            Record Blood Sugar
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">RBS</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="bs_rbs" value=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FBS</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="bs_fbs" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">BS - 2H ABF</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="bs_abf" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Creatinine -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Creatinine
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="creatinine" value="1">
                            Record Creatinine
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Creatinine</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="creatinine_details" value=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : CBC -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Complete Blood Count (CBC)
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cbc" value="1">
                            Record CBC
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CBC</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="cbc_details" cols="30" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Others -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Other Values / Parameters
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="others" value="1">
                            Record Other Values / Parameters
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Others</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="others_details" cols="30" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->

                  </div>
                  <!-- /Toogle Area -->

                  <!-- Toogle Area : Comments -->
                  <div class="toggle-div">

                    <p class="card-description card-description-custom">
                      Comments
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="others" value="1">
                            Record Comments
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <!-- Row -->
                    <div class="row toogle-block hidden-block">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Comments</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="comments_details" cols="30" rows="4"></textarea>
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
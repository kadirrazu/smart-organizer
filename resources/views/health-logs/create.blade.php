@extends('health-logs.layouts.master')

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

                @include('global.errors')
                @include('global.flashes')
              
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
                          <input type="text" class="form-control" name="log_date" value="{{ old('log_date') != '' ? old('log_date') : date('Y-m-d') }}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Time</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="log_time" value="{{ old('log_time') != '' ? old('log_time') : date('H:i:s') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="bp" value="1" {!! old('bp') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="sys" value="{{ old('sys') }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Diastolic</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="dia" value="{{ old('dia') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="hr" value="1" {!! old('hr') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="h_rate" value="{{ old('h_rate') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="wt" value="1" {!! old('wt') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="lp" value="1" {!! old('lp') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="lp_total" value="{{ old('lp_total') }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">HDL - Cholesterol</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_hdl" value="{{ old('lp_hdl') }}"/>
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
                            <input type="text" class="form-control" name="lp_ldl" value="{{ old('lp_ldl') }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Triglycerides</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lp_triglycerides" value="{{ old('lp_triglycerides') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="bs" value="1" {!! old('bs') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="bs_rbs" value="{{ old('bs_rbs') }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FBS</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="bs_fbs" value="{{ old('bs_fbs') }}"/>
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
                            <input type="text" class="form-control" name="bs_abf" value="{{ old('bs_abf') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="creatinine" value="1" {!! old('creatinine') == '1' ? 'checked="checked"' : '' !!}>
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
                            <input type="text" class="form-control" name="creatinine_details" value="{{ old('creatinine_details') }}"/>
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
                            <input type="checkbox" class="form-check-input" name="cbc" value="1" {!! old('cbc') == '1' ? 'checked="checked"' : '' !!}>
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
                            <textarea class="form-control" name="cbc_details" cols="30" rows="4">{{ old('cbc_details') }}</textarea>
                            <p class="info">
                              [ Separate Each Key Value pair with a PIPE. Separate Key and Value with '-'. For Example: WBC-5.4|RBC-7.3|ESR-12 ]
                            </p>
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
                            <input type="checkbox" class="form-check-input" name="others" value="1" {!! old('others') == '1' ? 'checked="checked"' : '' !!}>
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
                            <textarea class="form-control" name="others_details" cols="30" rows="4">{{ old('others_details') }}</textarea>
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
                            <input type="checkbox" class="form-check-input" name="comments" value="1" {!! old('comments') == '1' ? 'checked="checked"' : '' !!}>
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
                            <textarea class="form-control" name="comments_details" cols="30" rows="4">{{ old('comments_details') }}</textarea>
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


    //Toggle inner block by toggling a checkbox
    $('.toggle-div input[type="checkbox"]').on('click', function(e){

      if(this.checked){
        $(this).closest('.toggle-div').children('.toogle-block').removeClass('hidden-block');
      }
      else{
        $(this).closest('.toggle-div').children('.toogle-block').addClass('hidden-block');
      }

    });

    //Check if anyone is already checked. Then show the respective inner block.
    var $allCheckbox = $('.toggle-div input[type="checkbox"]:checked');

    $allCheckbox.each(function(e){      
        $(this).closest('.toggle-div').children('.toogle-block').removeClass('hidden-block');
    });

  });
</script>

@stop
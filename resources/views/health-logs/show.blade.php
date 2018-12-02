@extends('health-logs.layouts.master')

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-library-plus"></i>                 
        </span>
        View a Single Log
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>View a single log row from Database.
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

  <div class="row">
    <div class="col-md-12 mb-btn-set">
        
        <a href="{{ url('hl/logs/'.$log->id.'/edit') }}" class="btn btn-gradient-primary mr-2">
          Edit this Log
        </a>

    </div>
  </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">

                @include('global.flashes')

                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="4">Date and Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Date</td>
                        <td>{{ date_format( new DateTime($log->log_date), "d/m/Y") }}</td>
                        <td>Time</td>
                        <td>{{ date_format( new DateTime($log->log_time), "h:i:s A") }}</td>
                      </tr>
                    </tbody>
                  </table>

                @if( $log->bp == 1 )
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="4">Blood Pressure</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Measurement</td>
                        <td colspan="3">{{ $log->sys ." / ". $log->dia }}</td>
                      </tr>
                      <tr>
                        <td scope="row">Systolic</td>
                        <td>{{ $log->sys }}</td>
                        <td>Diastolic</td>
                        <td>{{ $log->dia }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif

                @if( $log->hr == 1 )
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Heart Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Heart Rate / Pulse</td>
                        <td scope="col" colspan="2">{{ $log->h_rate }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif

                @if( $log->wt == 1 )
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Weight</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Weight (in KG)</td>
                        <td scope="col" colspan="2">{{ $log->weight }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif

                @if( $log->lp == 1 )
                                      
                  @php

                    $lp_values = explode("|", $log->lp_details);

                  @endphp

                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="4">Lipid Profile / Cholesterol</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Cholesterol (Total)</td>
                        <td>{{ $lp_values[0] }}</td>
                        <td>HDL - Cholesterol</td>
                        <td>{{ $lp_values[1] }}</td>
                      </tr>
                      <tr>
                        <td scope="row">LDL - Cholesterol</td>
                        <td>{{ $lp_values[2] }}</td>
                        <td>Triglycerides</td>
                        <td>{{ $lp_values[3] }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif


                @if( $log->bs == 1 )
                                      
                  @php

                    $bs_values = explode("|", $log->bs_details);

                  @endphp

                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="6">Blood Sugar / Glucose</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">RBS</td>
                        <td>{{ (isset($bs_values[0]) && $bs_values[0] != '') ? $bs_values[0] : '-' }}</td>
                        <td>FBS</td>
                        <td>{{ (isset($bs_values[1]) && $bs_values[1] != '') ? $bs_values[1] : '-' }}</td>
                        <td>BS - 2H ABF</td>
                        <td>{{ (isset($bs_values[2]) && $bs_values[2] != '') ? $bs_values[2] : '-' }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif
                

                @if( $log->creatinine == 1 )
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Creatinine</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Creatinine</td>
                        <td scope="col" colspan="2">{{ $log->creatinine_details }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif


                @if( $log->cbc == 1 )
                                      
                  @php

                    $cbc_values = explode("|", $log->cbc_details);

                  @endphp
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Complete Blood Count (CBC)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">CBC Details</td>
                        <td scope="col">
                          @foreach($cbc_values as $val)
                            {!! $val . "<br><hr>" !!}
                          @endforeach
                        </td>
                      </tr>
                    </tbody>
                  </table>

                @endif

                @if( $log->others == 1 )
                                      
                  @php

                    $other_values = explode("|", $log->others_details);

                  @endphp
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Other Test Values / Parameters</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Others</td>
                        <td scope="col">
                          @foreach($other_values as $val)
                            {!! $val . "<br><hr>" !!}
                          @endforeach
                        </td>
                      </tr>
                    </tbody>
                  </table>

                @endif
                

                @if( $log->comments == 1 )
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Comments / Notes</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">Comments</td>
                        <td scope="col" colspan="2">{{ $log->comments_details }}</td>
                      </tr>
                    </tbody>
                  </table>

                @endif
                  
                  

            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  <div class="row">
    <div class="col-md-12 mb-btn-set">
        
        <a href="{{ url('hl/logs/'.$log->id.'/edit') }}" class="btn btn-gradient-primary mr-2">
          Edit this Log
        </a>

    </div>
  </div>
  
@stop
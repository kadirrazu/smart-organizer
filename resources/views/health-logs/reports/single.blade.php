<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Report Generator - SmartOrganizer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('health-logs.partials.pure-css')

        <style>
          thead td{
            font-weight: bold;
          }

          .table-heading{
            font-weight: bold;
            text-decoration: underline;
            font-size: 15px;
            margin-bottom: 20px;
          }

          .container{
            margin-top: 20px;
            margin-bottom: 20px;
          }

          .table-footer{
            font-style: italic;
            font-size: 10px;
          }

          table td, table th{
            padding: 10px;
          }

          .cus-rep-table thead th{
        background: #f7f7f7;
            padding-left: 25px !important;
          }

          .cus-rep-table th, .cus-rep-table td{
        text-align: left !important;
          }

          .cus-rep-table > tbody > tr > td:nth-child(1) {
        background: #fcf9f9;
        width: 30%;
        padding-left: 50px;
      }

          .cus-rep-table > tbody > tr > td:nth-child(2) {
        width: 70%;
        padding-left: 50px;
        padding-right: 50px;
      }

          @page {
        header: page-header;
        footer: page-footer;
      }
        </style>

    </head>
    <body>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="text-left table-heading">
            Health Report:
          </div>
        </div>
      </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">

                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="4">Date and Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row" class="w25">Date</td>
                        <td class="w25 align-c value">{{ date_format( new DateTime($log->log_date), "d/m/Y") }}</td>
                        <td class="w25">Time</td>
                        <td class="w25 align-c value">{{ date_format( new DateTime($log->log_time), "h:i:s A") }}</td>
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
                        <td scope="col" class="w25">Measurement</td>
                        <td colspan="3" class="w75 align-c value">{{ $log->sys ." / ". $log->dia }}</td>
                      </tr>
                      <tr>
                        <td scope="row" class="w25">Systolic</td>
                        <td class="w25 align-c value">{{ $log->sys }}</td>
                        <td class="w25">Diastolic</td>
                        <td class="w25 align-c value">{{ $log->dia }}</td>
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
                        <td scope="col" class="w25">Heart Rate / Pulse</td>
                        <td scope="col" class="w75 align-c value">{{ $log->h_rate }}</td>
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
                        <td scope="col" class="w25">Weight (in KG)</td>
                        <td scope="col" class="w75 align-c value">{{ $log->weight }}</td>
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
                        <td scope="row" class="w25">Cholesterol (Total)</td>
                        <td class="w25 align-c value">
                          {{ isset($lp_values[0]) ? $lp_values[0] : '-' }}
                        </td>
                        <td class="w25">HDL - Cholesterol</td>
                        <td class="w25 align-c value">
                          {{ isset($lp_values[1]) ? $lp_values[1] : '-' }}
                        </td>
                      </tr>
                      <tr>
                        <td scope="row" class="w25">LDL - Cholesterol</td>
                        <td class="w25 align-c value">
                          {{ isset($lp_values[2]) ? $lp_values[2] : '-' }}
                        </td>
                        <td class="w25">Triglycerides</td>
                        <td class="w25 align-c value">
                          {{ isset($lp_values[3]) ? $lp_values[3] : '-' }}
                        </td>
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
                        <th scope="col" colspan="4">Blood Sugar / Glucose</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row" class="w25">RBS</td>
                        <td class="w25 align-c value">
                          {{ (isset($bs_values[0]) && $bs_values[0] != '') ? $bs_values[0] : '-' }}
                        </td>
                        <td class="w25">FBS</td>
                        <td class="w25 align-c value">
                          {{ (isset($bs_values[1]) && $bs_values[1] != '') ? $bs_values[1] : '-' }}
                        </td>
                      </tr>
                      <tr>
                        <td class="w25">BS - 2H ABF</td>
                        <td class="w75 align-c value" colspan="3">
                          {{ (isset($bs_values[2]) && $bs_values[2] != '') ? $bs_values[2] : '-' }}
                        </td>
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
                        <td scope="col" class="w25">Creatinine</td>
                        <td scope="col"  class="w75 align-c value">
                            {{ $log->creatinine_details }}
                        </td>
                      </tr>
                    </tbody>
                  </table>

                @endif


                @if( $log->cbc == 1 )
                                      
                  @php

                    $cbc_values = explode("|", $log->cbc_details);
                    $counter = 0;
                    $totalValues = count($cbc_values);

                  @endphp
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Complete Blood Count (CBC)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col" class="w25">CBC Details</td>
                        <td scope="col" class="w75 align-l">
                          <table class="table table-bordered">
                            <tbody>
                          <?php
                                        
                                        foreach($cbc_values as $val){

                                          $counter++;
                                          $kVal = explode("-", $val);
                                          
                                          ?>
                                            <tr>
                                              <td>{{ $kVal[0] }}</td>
                                              <td>{{ $kVal[1] }}</td>
                                            </tr>
                                          <?php
                                        }
                                      ?>
                                        </tbody>
                                      </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                @endif

                @if( $log->others == 1 )
                                      
                  @php

                    $other_values = explode("|", $log->others_details);
                    $counter = 0;
                    $totalValues = count($other_values);

                  @endphp
                    
                  <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Other Test Values / Parameters</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col" class="w25">Others</td>
                        <td scope="col" class="w75 align-l">
                          <?php
                          foreach($other_values as $val){
                            $counter++;
                            echo $val . "<br>";
                            echo $totalValues != $counter ? "<hr>" : "";
                          }
                        ?>
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
                        <td scope="col" class="w25">Comments</td>
                        <td scope="col"  class="w75 align-l">{{ $log->comments_details }}</td>
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
</div>



    <htmlpagefooter name="page-footer">
      <div class="row">
        <div class="col-md-12">
          <div class="text-right table-footer">
            <span>Report Generated by <strong>SmartOrganizer</strong>. Date &amp; Time: {{ date('d/m/Y h:i:s A')}}.</span>
            <span class="text-right"> Page {PAGENO} of {nb}</span>
          </div>
        </div>
      </div>
    </htmlpagefooter>
  
</body>
</html>
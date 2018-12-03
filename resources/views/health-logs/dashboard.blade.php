@extends('health-logs.layouts.master')

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>                 
        </span>
        Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

    <div class="row">

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{!! asset('theme/images/dashboard/circle.svg') !!}" class="card-img-absolute" alt="circle-image"/>
            <h4 class="font-weight-normal mb-3">Logs at a Glance
              <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <table class="table">
              <tr>
                <td>Total Entries</td>
                <td>{{ \App\HealthLogs::all()->count() }}</td>
              </tr>
              <tr>
                <td>BP Entries</td>
                <td>{{ \App\HealthLogs::where('bp',1)->get()->count() ?: ''  }}</td>
              </tr>
              <tr>
                <td>Pulse/HR</td>
                <td>{{ \App\HealthLogs::where('hr',1)->get()->count() ?: ''  }}</td>
              <tr>
                <td>Weight</td>
                <td>{{ \App\HealthLogs::where('wt',1)->get()->count() ?: '' }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{!! asset('theme/images/dashboard/circle.svg') !!}" class="card-img-absolute" alt="circle-image"/>                  
            <h4 class="font-weight-normal mb-3">BP
              <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <?php

              $bp_stats = \App\HealthLogs::where('bp',1)->get();

              $bp_max = 0;
              $bp_min = 0;
              $bp_max_id = 0;
              $bp_min_id = 0;
              $total = 0;
              $counter = 0;

              foreach ($bp_stats as $stat) {

                $total = $stat->sys + $stat->dia;

                if( $counter == 0 ){
                  $bp_min = $total;
                }

                if( $total > $bp_max ){
                  $bp_max = $total;
                  $bp_max_id = $stat->id;
                }

                if( $bp_min >= $total ){
                  $bp_min = $total;
                  $bp_min_id = $stat->id;
                }

                $counter++;

              }

              $bpMaxObject = \App\HealthLogs::find($bp_max_id);
              $bpMinObject = \App\HealthLogs::find($bp_min_id);

            ?>
            <table class="table table-bordered">
              <tr>
                <td>Max</td>
                <td>
                  {{ $bpMaxObject->sys .' / '. $bpMaxObject->dia . ' (' . $bpMaxObject->log_date . ')' }}
                </td>
              <tr>
                <td>Min</td>
                <td>
                  {{ $bpMinObject->sys .' / '. $bpMinObject->dia . ' (' . $bpMinObject->log_date . ')' }}
                </td>
              </tr>
            </table>

            <br>

            <h4 class="font-weight-normal mb-3">HR/Pulse
              <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <?php

              $hr_stats = \App\HealthLogs::where('hr',1)->get();

              $hr_max = 0;
              $hr_min = 0;
              $hr_max_id = 0;
              $hr_min_id = 0;
              $total = 0;
              $counter = 0;

              foreach ($hr_stats as $stat) {

                $total = $stat->h_rate;

                if( $counter == 0 ){
                  $hr_min = $total;
                }

                if( $total > $hr_max ){
                  $hr_max = $total;
                  $hr_max_id = $stat->id;
                }

                if( $hr_min >= $total ){
                  $hr_min = $total;
                  $hr_min_id = $stat->id;
                }

                $counter++;

              }

              $hrMaxObject = \App\HealthLogs::find($hr_max_id);
              $hrMinObject = \App\HealthLogs::find($hr_min_id);

            ?>

            <table class="table table-bordered">
              <tr>
                <td>Max</td>
                <td>
                  {{ $hrMaxObject->h_rate . ' (' . $hrMaxObject->log_date . ')' }}
                </td>
              <tr>
                <td>Min</td>
                <td>
                  {{ $hrMinObject->h_rate . ' (' . $hrMinObject->log_date . ')' }}
                </td>
              </tr>
            </table>

          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{!! asset('theme/images/dashboard/circle.svg') !!}" class="card-img-absolute" alt="circle-image"/>                                    
            <h4 class="font-weight-normal mb-3">More Logs
              <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <table class="table">
              <tr>
                <td>Lipid Profile</td>
                <td>{{ \App\HealthLogs::where('lp',1)->get()->count() ?: ''  }}</td>
              </tr>
              <tr>
                <td>Blood Sugar</td>
                <td>{{ \App\HealthLogs::where('bs',1)->get()->count() ?: ''  }}</td>
              </tr>
              <tr>
                <td>Creatinine</td>
                <td>{{ \App\HealthLogs::where('creatinine',1)->get()->count() ?: ''  }}</td>
              <tr>
                <td>CBC</td>
                <td>{{ \App\HealthLogs::where('cbc',1)->get()->count() ?: '' }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">This Week</h4>
              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>                                     
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
  
@stop
@extends('health-logs.layouts.master')

@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@stop

@section('content')

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-file-document"></i>                 
        </span>
        Manage Logs
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Manage Health Logs from a Single Screen
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>

  <div class="row">
    <div class="col-md-12 mb-btn-set">
        
        <a href="{{ url('hl/logs/create') }}" class="btn btn-gradient-primary mr-2">
          Add New Log
        </a>

    </div>
  </div>

  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            @include('global.flashes')

            <div class="clearfix">

              @foreach($all_logs as $log)

                {!! $log->id !!}

              @endforeach
              
              @if($all_logs->count() > 0)

                <div class="resource-table">

                  <table id="dt-table" class="table table-striped table-bordered text-center dt-table" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-left">Date &amp; Time</th>
                            <th>BP</th>
                            <th>HR</th>
                            <th>Weight</th>
                            <th>LP</th>
                            <th>Sugar</th>
                            <th>Creatinine</th>
                            <th>CBC</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($all_logs as $log)

                        <tr>
                            <td class="text-left">
                              {{ $log->log_date }} @ {{ $log->log_time }}
                            </td>
                            <td>{{ $log->bp == 1 ? $log->sys .' / '. $log->dia : '-' }}</td>
                            <td>{{ $log->hr == 1 ? $log->h_rate : '-' }}</td>
                            <td>{{ $log->wt == 1 ? $log->weight : '-' }}</td>
                            <td>
                              {!! $log->lp == 1 ? '<i class="mdi mdi-checkbox-marked-outline text-success"></i>' : '<i class="mdi mdi-close-box-outline text-danger"></i>' !!}
                            </td>
                            <td>
                              {!! $log->bs == 1 ? '<i class="mdi mdi-checkbox-marked-outline text-success"></i>' : '<i class="mdi mdi-close-box-outline text-danger"></i>' !!}
                            </td>
                            <td>
                              {!! $log->creatinine == 1 ? '<i class="mdi mdi-checkbox-marked-outline text-success"></i>' : '<i class="mdi mdi-close-box-outline text-danger"></i>' !!}
                            </td>
                            <td>
                              {!! $log->cbc == 1 ? '<i class="mdi mdi-checkbox-marked-outline text-success"></i>' : '<i class="mdi mdi-close-box-outline text-danger"></i>' !!}
                            </td>
                            <td>
                              <a href="{{ url('hl/logs/'.$log->id) }}" class="btn btn-default tbl-action-btn" title="View">
                                <i class="mdi mdi-eye"></i>
                              </a>
                              <a href="{{ url('hl/logs/'.$log->id.'/edit') }}" class="btn btn-default tbl-action-btn" title="Edit">
                                <i class="mdi mdi-table-edit"></i>
                              </a>
                              <form method="POST" action="{{ url('hl/logs/'.$log->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-default btn-delete-record tbl-action-btn" title="Delete">
                                  <i class="mdi mdi-delete"></i>
                                </button>
                              </form>
                            </td>
                        </tr>

                      @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-left">Date &amp; Time</th>
                            <th>BP</th>
                            <th>HR</th>
                            <th>Weight</th>
                            <th>LP</th>
                            <th>Sugar</th>
                            <th>Creatinine</th>
                            <th>CBC</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                  </table>

                </div>

              @else

                <div>No records found!</div>

              @endif

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  
@stop

@section('script')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
  jQuery(document).ready(function($) {

    $('#dt-table').DataTable({
      ordering:  false
    });

    $('.btn-delete-record').on('click', function(e){
      var decision = confirm('Are you sure about deleting this record?');

      if(!decision){
        e.preventDefault();
      }
    });

  });
</script>

@stop
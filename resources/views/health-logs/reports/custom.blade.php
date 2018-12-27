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

        	.cus-rep-table tr td, .cus-rep-table tr th{
        		text-align: left;
        	}

        	.cus-rep-table tr td:nth-child(1) {
			  background: #fcf9f9;
			  width: 30%;
			  padding-left: 50px;
			}

        	.cus-rep-table tr td:nth-child(2) {
			  width: 70%;
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
				<div class="col-md-12 text-center">

					@if( $results->count() > 0)

						@foreach($results as $result)

						<table class="table table-bordered text-center cus-rep-table">
							
							<thead>
								<tr>
									<th colspan="2">Date & Time : {{ date_format( new DateTime($result->log_date), "d/m/Y") }} {{ date_format( new DateTime($result->log_time), "h:i:s A") }}</th>
								</tr>
							</thead>

							<tbody>
								
								<?php 

									foreach($items as $key => $val) :

								?>
								
									<?php

									switch ($key) 
									{
									    
									    case "bp":

									    if( $result->bp == 1 ){
									?>
										<tr>
											<td>Blood Pressure</td>
											<td>{{ $result->bp == 1 ? $result->sys ." / ". $result->dia : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "hr":

									    if( $result->hr == 1 ){
									?>
										<tr>
											<td>Heart Rate</td>
											<td>{{ $result->hr == 1 ? $result->h_rate : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "wt":

									    if( $result->wt == 1 ){
									?>
										<tr>
											<td>Weight</td>
											<td>{{ $result->wt == 1 ? $result->weight . ' KG' : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "lp":

									    if( $result->lp == 1 ){
									?>
										<tr>
											<td>Lipid Profile</td>
											<td>{{ $result->lp == 1 ? $result->lp_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "bs":

									    if( $result->bs == 1 ){
									?>
										<tr>
											<td>Blood Sugar</td>
											<td>{{ $result->bs == 1 ? $result->bs_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "creatinine":

									    if( $result->creatinine == 1 ){
									?>
										<tr>
											<td>Creatinine</td>
											<td>{{ $result->creatinine == 1 ? $result->creatinine_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "cbc":

									    if( $result->cbc == 1 ){
									?>
										<tr>
											<td>Complete Blood Count (CBC)</td>
											<td>{{ $result->cbc == 1 ? $result->cbc_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "others":

									    if( $result->others == 1 ){
									?>
										<tr>
											<td>Others</td>
											<td>{{ $result->others == 1 ? $result->others_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "comments":

									    if( $result->comments == 1 ){
									?>
										<tr>
											<td>Comments</td>
											<td>{{ $result->comments == 1 ? $result->comments_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;
									?>

									<?php } //End of Switch ?>


								<?php endforeach; //End of Foreach ?>

								
							</tbody>

						</table>

						@endforeach

					@else

						<table class="table table-bordered text-center">
							<tr>
								<th>No result was found!</th>
							</tr>
						</table>

					@endif

				</div>
			</div>
			<!--/row-->
			

		</div>
		<!--/container-->

		<htmlpagefooter name="page-footer">
			<div class="row">
				<div class="col-md-12">
					<div class="text-left table-footer">
						<span>Report Generated by <strong>SmartOrganizer</strong>. Date &amp; Time: {{ date('d/m/Y h:i:s A')}} </span>
					</div>
				</div>
			</div>
		</htmlpagefooter>

    </body>
</html>
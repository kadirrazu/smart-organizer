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
				<div class="col-md-12 text-center">

					@if( $results->count() > 0)

						@foreach($results as $result)

						<table class="table table-bordered cus-rep-table">
							
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
											<td style="width: 30%">Blood Pressure</td>
											<td style="width: 70%">{{ $result->bp == 1 ? $result->sys ." / ". $result->dia : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "hr":

									    if( $result->hr == 1 ){
									?>
										<tr>
											<td style="width: 30%">Heart Rate</td>
											<td style="width: 70%">{{ $result->hr == 1 ? $result->h_rate : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "wt":

									    if( $result->wt == 1 ){
									?>
										<tr>
											<td style="width: 30%">Weight</td>
											<td style="width: 70%">{{ $result->wt == 1 ? $result->weight . ' KG' : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "lp":

									    if( $result->lp == 1 ){

									    	$lp_values = explode("|", $result->lp_details);
									?>
										<tr>
											<td style="width: 30%">Lipid Profile / Cholesterol</td>
											<td style="width: 70%">
												<table class="table table-bordered">
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
											</td>
										</tr>
									<?php
									    }
									    break;

									    case "bs":

									    if( $result->bs == 1 ){

									    	$bs_values = explode("|", $result->bs_details);
									?>
										<tr>
											<td style="width: 30%">Blood Sugar / Glucose</td>
											<td style="width: 70%">
												<table class="table table-bordered">
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
											</td>
										</tr>
									<?php
									    }
									    break;

									    case "creatinine":

									    if( $result->creatinine == 1 ){
									?>
										<tr>
											<td style="width: 30%">Creatinine</td>
											<td style="width: 70%">{{ $result->creatinine == 1 ? $result->creatinine_details : '-' }}</td>
										</tr>
									<?php
									    }
									    break;

									    case "cbc":

									    if( $result->cbc == 1 ){

									    	$cbc_values = explode("|", $result->cbc_details);
						                    $counter = 0;
						                    $totalValues = count($cbc_values);
									?>
										<tr>
											<td style="width: 30%">Complete Blood Count (CBC)</td>
											<td style="width: 70%">
												<table class="table table-bordered">
													<tbody>
												<?php
						                          
						                          foreach($cbc_values as $val){

						                            $counter++;
						                            $kVal = explode("-", $val);
						                            
						                            ?>
														<tr>
															<td style="width: 50%; text-align:center;">{{ $kVal[0] }}</td>
															<td style="width: 50%; text-align:center;">{{ $kVal[1] }}</td>
														</tr>
						                            <?php
						                          }
						                        ?>
						                        	</tbody>
						                        </table>
											</td>
										</tr>
									<?php
									    }
									    break;

									    case "others":

									    if( $result->others == 1 ){

									    	$other_values = explode("|", $result->others_details);
						                    $counter = 0;
						                    $totalValues = count($other_values);
									?>
										<tr>
											<td style="width: 30%">Others</td>
											<td style="width: 70%">
												<?php
						                            foreach($other_values as $val){
						                              $counter++;
						                              echo $val . "<br>";
						                              echo $totalValues != $counter ? "<hr>" : "";
						                            }
						                          ?>
											</td>
										</tr>
									<?php
									    }
									    break;

									    case "comments":

									    if( $result->comments == 1 ){
									?>
										<tr>
											<td style="width: 30%">Comments</td>
											<td style="width: 70%">{{ $result->comments == 1 ? $result->comments_details : '-' }}</td>
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
					<div class="text-right table-footer">
						<span>Report Generated by <strong>SmartOrganizer</strong>. Date &amp; Time: {{ date('d/m/Y h:i:s A')}}.</span>
						<span class="text-right"> Page {PAGENO} of {nb}</span>
					</div>
				</div>
			</div>
		</htmlpagefooter>

    </body>
</html>
<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
					<div class="col-sm-6 portlets">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Campaign Manager</strong></h2>
							</div>
							<div class="widget-content padding">
								<?php 
								    if (isset($info)) {
								        # code...
								        echo $info;
								    }
								?>
								<form role="form" id="bulkCampaignForm" action="<?php echo $host?>/campaign/bulk" method="post" enctype="multipart/form-data">

									<ul id="demo1" class="nav nav-tabs">
										<li class="active">
											<a href="#campaign" data-toggle="tab" aria-expanded="false">Set Campaign</a>
										</li>
										<li>
											<a href="#base" data-toggle="tab" aria-expanded="true">Add To Base</a>
										</li>
									</ul></br>

									<!-- <h4>Basic</h4>
									 <div class="form-group">
										<label>Location</label>
		                                <select class="form-control" name="location">
		                        			<option value="unspecified">Unspecified</option>
		                                </select>
									 </div>

									 <div class="form-group">
										<label>Age</label>
		                                <select class="form-control" name="location">
		                        			<option value="unspecified">Unspecified</option>
		                                </select>
									 </div> -->
								
									<div class="tab-content">

										<div class="tab-pane active fade in" id="campaign">

											<div class="form-group">
												<label>Title</label>
				                                <input class="form-control" name="title" />
				                     
											</div>

											<div class="form-group">
												<label>Service</label>
				                                <select class="form-control" name="profile">
				                        			<option value="null">-Select Service-</option>
				                                </select>
											</div>

											<div class="form-group">
												<h4>Method</h4>

												<ul id="method" class="nav nav-pills">
													<li class="active">
														<a href="#from-base" data-toggle="tab" aria-expanded="false">Choose From Base</a>
													</li>
													<li>
														<a href="#sample" data-toggle="tab" aria-expanded="true">Paste Samples</a>
													</li>
													<li>
														<a href="#file" data-toggle="tab" aria-expanded="true">Upload File</a>
													</li>
												</ul>
											</div>

											<div class="tab-content">

												<div id="from-base" class="form-group tab-pane active fade in">
		
		  											<label for="comment">Target Size</label>
													<p>
														<input type="radio" name="target_size" value="50000" /> 50k
														<input type="radio" name="target_size" value="100000" /> 100k
														<input type="radio" name="target_size" value="150000" /> 150k
														<input type="radio" name="target_size" value="200000" /> 200k
													</p>

													<label for="comment">Last Campaigned to</label>
											        <select class="form-control" name="last_campaign">
														<option value="7">7 days</option>
														<option value="14">14 days</option>
											        </select>
												</div>

												<div id="sample" class="form-group tab-pane fade in">
		  											<label for="comment">Separate Phone Numbers with comma(,)</label>
													<textarea class="form-control" name="sample_msisdn" rows="5" id="msisdn"></textarea>
												</div>

												<div id="file" class="row form-group tab-pane fade in">
		  											<label class="col-sm-2 control-label">File Input</label>
		  											<div class="col-sm-10">
		  											  <input type="file" class="btn btn-default" name="instant_file" title="Select file">
		  											</div>
												</div>

											</div>

											<div class="row form-group">
											  	<label class="col-sm-2 control-label">Message </label>
											  	<div class="col-sm-10">
											  		<textarea onkeyup="textCounter(this,'counter2',2000);" class="form-control" name="msg"></textarea>
											  		<p><input disabled  maxlength="5" size="5" value="0" id="counter2"></p>
											  	</div>
											</div>

											<div class="row form-group">
	  											<label class="col-sm-2 control-label">Schedule</label>
												<div class="col-sm-10">
													<input type="radio" name="size" /> Yes
													<input type="radio" name="size" /> No
												</div>
											</div>

											<div id="schedule">
										
												<div class="row form-group">
													<label class="col-sm-2 control-label">Date</label>
													<div class="col-sm-10">
													  <input type="text" class="form-control datepicker-input" name="schedule_time">
													</div>
												</div>

												<div class="row form-group">
													<label for="time-select" class="col-sm-2 control-label">Time</label>
													<div class="col-sm-10">
											          <select class="form-control" name="profile">
											  			<option value="null">-Select Time-</option>
											  			<option value="0">0:00</option>
											  			<option value="0">1:00</option>
											          </select>
													</div>
												</div>
<!-- 
												<div class="row form-group">
													<label for="time-select" class="col-sm-4 control-label">Speculated Finish Time</label>
													<div class="col-sm-8">
											          
													</div>
												</div> -->

											</div>

											<input type="submit" class="btn btn-danger pull-right" name="startCampaignBtn" value="Send">

										</div> <!-- / .tab-pane -->

										<div class="tab-pane fade in" id="base">
											<div class="form-group">
										
												<div class="form-group">
												  	<label>Select File: </label>
												  	<input type="file" name="file" class="form-control btn btn-default" title="Select file">
												</div>
														
											</div>

											<input type="submit" class="btn btn-primary" name="addBaseBtn" value="Add to Base">  

										</div> <!-- / .tab-pane -->
									</div> <!-- / .tab-content -->
									  
									
									
								</form>
							</div>
						</div>
						
					</div>

					<div class="col-sm-6 portlets">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>History</strong> Data</h2>
							</div>

							<div class="widget-content padding">
								<div id="bar"></div>
							</div>
						</div>
					</div>

				</div>

				

				<script>

					function textCounter(field,field2,maxlimit){

					 var countfield = document.getElementById(field2);
					 if ( field.value.length > maxlimit ) {
					  field.value = field.value.substring( 0, maxlimit );
					  return false;
					 } else {
					  countfield.value = field.value.length;
					 }

					}
				
					$(function() {

					  // HardCoded Morris

					  Morris.Bar({
					    element: 'bar',
					    data: [
					      { y: '2015-05-23', a: 100, b: 90 },
					      { y: '2015-05-24', a: 75,  b: 65 , c: 23},
					      { y: '2015-05-25', a: 50,  b: 40 , c: 46},
					      { y: '2025-05-26', a: 15,  b: 65 , c: 73},
					      { y: '2015-05-27', a: 50,  b: 40 , c: 24},
					      { y: '2015-05-28', a: 40,  b: 65 , c: 58},
					      { y: '2015-05-29', a: 100, b: 90 , c: 20}
					    ],
					    xkey: 'y',
					    ykeys: ['a', 'b', 'c'],
					    labels: ['Received SMS', 'Sent SMS', 'DLR'],
					    colors: ['#0b62a4','#242563', '#fdffabs']
					  });
					 
					});

				</script>
				  

<?php include_once 'footer.php'; ?>
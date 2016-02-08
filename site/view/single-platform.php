<?php include_once 'header.php' ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<!-- Start info box -->
				<div class="row top-summary">
					<div class="col-lg-12 col-md-6 text-center">
					<?php if ( !isset($status) && rtrim($status[0], ',') != 'running') : ?>
						<div class="widget pink-1">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-clock"></i>
								</div>
								<div class="text-box">
									<p class="maindata">GATEWAY <b>DOWN</b></p>
									<h2>
                                        <span class="animate-number" data-value="0"></span>d
                                        <span class="animate-number" data-value="0"></span>h
                                        <span class="animate-number" data-value="0"></span>m
                                        <span class="animate-number" data-value="0"></span>s
                                    </h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div class="widget green-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-clock"></i>
								</div>
								<div class="text-box">
									<p class="maindata">GATEWAY <b>UPTIME</b></p>
									<h2>
                                        <span class="animate-number" data-value="<?php echo $status[2]?>" data-duration="1000"></span>
                                        <span class="animate-number" data-value="<?php echo $status[3]?>" data-duration="3000"></span>
                                        <span class="animate-number" data-value="<?php echo $status[4]?>" data-duration="1000"></span>
                                        <span class="animate-number" data-value="<?php echo $status[5]?>" data-duration="3000"></span>
                                    </h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget lightblue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-logout-1"></i>
								</div>
								<div class="text-box">
									<p class="maindata"> SENT<b> SMS</b></p>
									<h2><span class="animate-number" data-value="<?php echo $sent ?>" data-duration="3000">0</span></h2>

									<div class="clearfix"></div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget darkblue-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-login-1"></i>
								</div>
								<div class="text-box">
									<p class="maindata"> RECEIVED <b>SMS</b></p>
									<h2><span class="animate-number" data-value="<?php echo $received ?>" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget pink-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-chain"></i>
								</div>
								<div class="text-box">
									<p class="maindata"> <b>QUEUED</b></p>
									<h2><span class="animate-number" data-value="<?php echo $queued ?>" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget yellow-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-login-1"></i>
								</div>
								<div class="text-box">
									<p class="maindata"> DELIVERY <b>REPORT</b></p>
									<h2><span class="animate-number" data-value="<?php echo $dlr ?>" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- End of info box -->

				<div class="row">
					<div class="col-lg-8 portlets">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>History</strong> Data</h2>
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
									<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
								</div>
							</div>

							<div class="widget-content padding">
								<div id="bar"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 portlets">
						<div class="widget">
                            <div class="widget-header transparent">
                                <h2><strong>Connection Bind</strong></h2>
                                <div class="additional-btn">
                                    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                </div>
                            </div>
                            <div class="widget-content">                    
                                <div class="table-responsive">
                                    <table data-sortable class="table">
                                        
                                        <tbody>
                                        	<?php foreach ($smscs as $smsc) :  ?>
                                            <tr>
                                                <td><strong><?php echo $smsc->id ?></strong></td>
                                                <td><span class="label label-<?php echo ($smsc->status=="dead") ? 'danger' : 'success' ?>"><?php echo $smsc->status ?></span></td>
                                                <td>
                                                    <div class="btn-group btn-group-xs">
                                                        <a href='<?php echo $host?>/bind' data-toggle="tooltip" title="Details" class="btn btn-default"><i class="fa fa-file-text-o"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        	<?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

					</div>

					<div id="sales-report" class="collapse in hidden-xs">
						<div class="table-responsive">
						<table data-sortable="" class="table table-striped" data-sortable-initialized="true">
							<thead>
								<tr><th width="70">No</th><th data-sortable="false" width="40"><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" id="select-all-rows" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></th><th width="120">Order ID</th><th>Buyer</th><th width="100">Status</th><th width="150">Location</th><th width="120">Total</th></tr>
							</thead>
							<tbody>
								<tr><td>1</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0021</td><td><a href="#">John Doe</a></td><td><span class="label label-primary">Order</span></td><td>Yogyakarta, ID</td><td><strong class="text-primary">$ 1,245</strong></td></tr>
								<tr><td>2</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0022</td><td><a href="#">Johnny Depp</a></td><td><span class="label label-success">Payment</span></td><td>London, UK</td><td><strong class="text-success">$ 1,245</strong></td></tr>
								<tr><td>3</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0023</td><td><a href="#">Scarlett Johansson</a></td><td><span class="label label-success">Payment</span></td><td>Canbera, AU</td><td><strong class="text-success">$ 1,245</strong></td></tr>
								<tr><td>4</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0024</td><td><a href="#">Hanna Barbara</a></td><td><span class="label label-danger">Cancel</span></td><td>Bali, ID</td><td><strong class="text-danger">$ 1,245</strong></td></tr>
								<tr><td>5</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0025</td><td><a href="#">Ali Larter</a></td><td><span class="label label-primary">Order</span></td><td>Bandung, ID</td><td><strong class="text-primary">$ 1,245</strong></td></tr>
								<tr><td>6</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0026</td><td><a href="#">Willy Wonka</a></td><td><span class="label label-danger">Cancel</span></td><td>Semarang, ID</td><td><strong class="text-danger">$ 1,245</strong></td></tr>
								<tr><td>7</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0027</td><td><a href="#">Chris Isaac</a></td><td><span class="label label-warning">Waiting</span></td><td>New York, US</td><td><strong class="text-warning">$ 1,245</strong></td></tr>
								<tr><td>8</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0028</td><td><a href="#">Jenny Doe</a></td><td><span class="label label-primary">Order</span></td><td>Boston, US</td><td><strong class="text-primary">$ 1,245</strong></td></tr>
								<tr><td>9</td><td><div class="icheckbox_square-aero" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="rows-check" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td><td>#0029</td><td><a href="#">Ban ki moon</a></td><td><span class="label label-danger">Cancel</span></td><td>Boston, US</td><td><strong class="text-danger">$ 1,245</strong></td></tr>

							</tbody>
						</table>
						</div>
					</div>
					
				</div>



				<script>
				$(function() {

				  // Create a function that will handle AJAX requests
				  function requestData(){
				    $.ajax({
				      type: "GET",
				      url: "<?php echo $host?>/report/api/usage", // This is the URL to the API
				    })
				    .done(function( data ) {
				      // When the response to the AJAX request comes back render the chart with new data
				      console.log(data);
				      chart.setData(JSON.parse(data));
				    })
				    .fail(function() {
				      // If there is no communication between the server, show an error
				      alert( "error occured" );
				    });
				  }

				  var chart = Morris.Bar({
				    // ID of the element in which to draw the chart.
				    element: 'bar',
				    // Set initial data (ideally you would provide an array of default data)
				    data: [0,0,0,0,0],
				    xkey: 'date',
				    ykeys: ['received', 'sent', 'dlr'],
				    labels: ['Received SMS', 'Sent SMS', 'DLR'],
				  	colors: ['#0b62a4','#242563', '#fdffabs']
				  });

				  // Request initial data for the past 5 days:
				  requestData();

				  // HardCoded Morris

				  // Morris.Bar({
				  //   element: 'bar',
				  //   data: [
				  //     { y: '2015-05-23', a: 100, b: 90 , c: 23},
				  //     { y: '2015-05-24', a: 75,  b: 65 , c: 23},
				  //     { y: '2015-05-25', a: 50,  b: 40 , c: 46},
				  //     { y: '2025-05-26', a: 15,  b: 65 , c: 73},
				  //     { y: '2015-05-27', a: 50,  b: 40 , c: 24},
				  //     { y: '2015-05-28', a: 40,  b: 65 , c: 58},
				  //     { y: '2015-05-29', a: 100, b: 90 , c: 20}
				  //   ],
				  //   xkey: 'y',
				  //   ykeys: ['a', 'b', 'c'],
				  //   labels: ['Received SMS', 'Sent SMS', 'DLR'],
				  //   colors: ['#0b62a4','#242563', '#fdffabs']
				  // });
				 
				});

				</script>


<?php include_once 'footer.php'; ?>
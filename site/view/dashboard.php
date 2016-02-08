<?php include_once 'header.php' ?>

	<!-- Start right content -->
    <div class="content-page">
		<!-- ============================================================== -->
		<!-- Start Content here -->
		<!-- ============================================================== -->
        <div class="content">

			<div class="row">
			<?php foreach ($platforms as $key => $platform) { ?>
			<?php print_r($platform); ?>

				<div class="col-lg-4 portlets">

					<div class="widget">

                        <div class="widget-header transparent">
                            <h1 class="text-center"><?php echo ucwords($platform['platform_name']) ?></h1>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            </div>
                        </div>
                        <div class="widget-content padding">                    
        					
        					<div class="panel-group accordion-toggle" id="accordiondemo">

						  <div class="panel panel-green-1">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion3" class="collapsed text-center" aria-expanded="false">
						        	<?php if ( !isset($platform['gateway_uptime']) && rtrim($platform['gateway_uptime'][0], ',') != 'running') : ?>
            						<div class="widget pink-1">
            							<div class="widget-content padding">
            								<div class="widget-icon">
            									<i class="icon-clock"></i>
            								</div>
            								<div class="text-box">
            									<p class="maindata">GATEWAY <b>DOWN</b></p>
            									
            									<div class="clearfix"></div>
            								</div>
            							</div>
            						</div>
            						<?php else : ?>
            						<div class="widget green-1 animated fadeInDown">
            							<div class="widget-content">
            								<div class="text-box text-center">
            									<p class="maindata">GATEWAY <b>UPTIME <i class="fa fa-clock-o"></i></b></p>
            									<h3>
                                                    <span class="animate-number" data-duration="1000"><?php echo $platform['gateway_uptime'][2]?></span>d
                                                    <span class="animate-number" data-duration="3000"><?php echo $platform['gateway_uptime'][3]?></span>h
                                                    <span class="animate-number" data-duration="1000"><?php echo $platform['gateway_uptime'][4]?></span>m
                                                    <span class="animate-number" data-duration="3000"><?php echo $platform['gateway_uptime'][5]?></span>s
                                                </h3>
            									<div class="clearfix"></div>
            								</div>
            							</div>
            						</div>
        							<?php endif; ?>
						        </a>
						      </h4>
						    </div>
						    <div id="accordion3" class="panel-collapse collapse" aria-expanded="false">
						      <div class="panel-body">
						      	<div class="col-md-6">
						      		<div class="widget lightblue-2 animated fadeInDown">
						      			<div class="widget-content">
						      				<div class="text-box text-center">
						      					<p class="maindata"> SENT<b> SMS <i class="fa fa-sign-in"></i></b></p>
						      					<h4><span class="animate-number" data-value="<?php echo $sent ?>" data-duration="3000">0</span></h4>
						      					<div class="clearfix"></div>
						      				</div>
						      			</div>

						      		</div>
						      	</div>

						      	<div class="col-md-6">
						      		<div class="widget darkblue-1 animated fadeInDown">
						      			<div class="widget-content">
						      				<div class="text-box text-center">
						      					<p class="maindata"> RECEIVED <b>SMS <i class="fa fa-sign-out"></i></b></p>
						      					<h4><span class="animate-number" data-value="<?php echo $received ?>" data-duration="3000">0</span></h4>
						      					<div class="clearfix"></div>
						      				</div>
						      			</div>
						      		</div>
						      	</div>

						      	<div class="col-md-6">
						      		<div class="widget pink-1 animated fadeInDown">
						      			<div class="widget-content">
						      				<div class="text-box text-center">
						      					<p class="maindata"> <b>QUEUED <i class="fa fa-chain"></i></b></p>
						      					<h4><span class="animate-number" data-value="" data-duration="1000">40000000</span></h4>
						      					<div class="clearfix"></div>
						      				</div>
						      			</div>
						      		</div>
						      	</div>

						      	<div class="col-md-6">
						      		<div class="widget yellow-1 animated fadeInDown">
						      			<div class="widget-content">
						      				<div class="text-box text-center">
						      					<p class="maindata"> DELIVERY <b>REPORT</b></p>
						      					<h4><span class="animate-number" data-value="<?php echo $dlr ?>" data-duration="3000">0</span></h4>
						      					<div class="clearfix"></div>
						      				</div>
						      			</div>
						      		</div>
						      	</div>
						      </div>
						    </div>
						  </div>
						</div>
						<hr>

    					<div class="row">

                        	<div class="text-center">
                        		<h3 class="text-dark">System Module</h3>
                        		<span class="col-md-4">
                            		<p><strong>SMSBOX</strong></p>
                            		<span class="label label-success">Online 32892s</span>
                            	</span>
                            	<span class="col-md-4">
                            		<p><strong>SQLBOX</strong></p>
                            		<span class="label label-success">Online 32892s</span>
                            	</span>
                            	<span class="col-md-4">
                            		<p><strong>SEVAS</strong></p>
                            		<span class="label label-success">Online 32892s</span>
                            	</span>
                        	</div>

    					</div>


                        <table data-sortable class="table">
                            <thead><h3 class="text-dark text-center">SMPP Bind</h3></thead>
                            <tbody>
                            	<?php foreach ($smscs as $smsc) :  ?>
                                <tr>
                                    <td><strong><?php echo $smsc->id ?></strong></td>
                                    <td><span class="label label-<?php echo ($smsc->status=="dead") ? 'danger' : 'success' ?>"><?php echo $smsc->status ?></span></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a href='<?php echo $host?>/bind' data-toggle="tooltip" title="QUEUE STATUS" class="btn btn-default"><i class="fa fa-link"></i>10000</a>
                                        </div>
                                    </td>
                                </tr>
                            	<?php endforeach?>
                            </tbody>
                        </table>

                        </div>
					</div>
				</div>
			<?php }?>

			</div>


			<style type="text/css">
				h3, h4 span.animate-number{
					color: white;
				}
				.text-dark{
					color: black;
				}
				span.label {
					padding: 0.6em 0.6em;
					font-size: 12px;
				}
			</style>

<?php include_once 'footer.php'; ?>
<?php require_once 'controllers/checkouthis.php'; ?>
<?php require_once 'template/header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Check-out History</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<?php if($datas->count()): ?>
			<div class="col-sm-12">
				<div class="panel-group" id="accordion">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-12">		
									<div class="row">
										<div class="col-sm-3"><small>Tracking Number</small></div>
										<div class="col-sm-3"><small>Date & Time</small></div>
										<div class="col-sm-2"><small>Department</small></div>
										<div class="col-sm-3"><small>Status</small></div>
										<div class="col-sm-1">&nbsp;&nbsp;</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $c = 1; ?>
					<?php foreach($datas->results() as $data): ?>
						<?php $c++; ?>
						<div class="panel panel-success">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion<?php echo $c; ?>" href="#collapse<?php echo $c; ?>">
									<div class="row">
										<div class="col-sm-3"><small><?php echo escape($data->trackingNum); ?></small></div> <!--2/9/2015 paul-->
										<div class="col-sm-3">
											<?php $date = date('M j, Y g:ia', strtotime($data->date)); ?>
											<small>
												<?php echo escape($date); ?>
											</small>
										</div>
										<div class="col-sm-2">
											<small>
												<?php if($data->department == 1): ?>
													Accounting
												<?php elseif($data->department == 2): ?>
													Marketing
												<?php elseif($data->department == 3): ?>	
													Human Resource
												<?php else: ?>
												<?php endif; ?>		
											</small>
										</div>
										<div class="col-sm-3">
											<small>
												<?php if($data->status == 1): ?>
													For Approval
												<?php elseif($data->status == 2): ?>
													Acknowledged (For Approval)
												<?php elseif($data->status == 3): ?>
													Approved
												<?php elseif($data->status == 4): ?>
													Disapproved
												<?php else: ?>
												<?php endif; ?>
											</small>
										</div>
										<div class="col-sm-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></div>
									</div>
								</a>
							</div>
							<div id="collapse<?php echo $c; ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-1"><p><small><strong>Application</strong></small></p></div>
										<div class="col-sm-2">
											<small>
												<?php if($data->application == 1): ?>
													 QnE Business Solution
												<?php elseif($data->application == 2): ?>
													MSI Payroll XP
												<?php else: ?>
												<?php endif; ?>
											</small>
										</div>
										<div class="col-sm-1"><p><small><strong>Type</strong></small></p></div>
										<div class="col-sm-2">
											<small>
												<?php if($data->type == 1): ?>
													 Documentation
												<?php elseif($data->type == 2): ?>
													Source Code
												<?php elseif($data->type == 3): ?>
													File (Related File)
												<?php else: ?>
												<?php endif; ?>
											</small>
										</div>
										<div class="col-sm-3"></div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>Name</strong></small></p></div>
										<div class="col-sm-10">
											<small>
												<?php if($users->count()): ?>
													<?php foreach($users->results() as $user): ?>
														<?php if($data->userId == $user->id): ?>
															<?php echo escape($user->name); ?>
														<?php endif; ?>	
													<?php endforeach; ?>
												<?php endif; ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>File Name</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->file); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>Version Date</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->version); ?>
											</small>
										</div>
									</div>
									<?php if($data->note) :?>
										<div class="row">
											<div class="col-sm-2"><p><small><strong>Note</strong></small></p></div>
												<div class="col-sm-10">
												<small>
													<?php echo escape($data->note); ?>
												</small>
											</div>
										</div>
									<?php endif; ?>
									<?php if($data->processNote): ?>
										<div class="row">
										<div class="col-sm-2"><p><small><strong>Admin Note</strong></small></p></div>
										<div class="col-sm-10">
											<?php $date = date('M j, Y g:ia', strtotime($data->processDate)); ?>
											<small>
												<?php echo escape($data->processNote); ?>
												<?php if($users->count()): ?>
													<?php foreach($users->results() as $user): ?>
														<?php if($data->processId == $user->id): ?>
															<p class="text-left"><small> &#8212; <?php echo escape($user->name) .  ", {$date}."; ?></small></p>
														<?php endif; ?>	
													<?php endforeach; ?>
												<?php endif; ?>
											</small>
										</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>	
				</div>	
			</div>
		<?php endif; ?>
	</div><!-- /.row -->
</div><!-- /#page-wrapper -->
<?php require_once 'template/footer.php'; ?>
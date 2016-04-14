<?php require_once 'controllers/checkinapp.php'; ?>
<?php require_once 'template/header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Checkin</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<?php require_once 'template/message.php'; ?>
	</div>
	<div class="row">
		<?php $token = Token::generate();?>
		<?php if($datas2->count()): ?>
			<div class="col-sm-12">
				<div class="panel-group" id="accordion">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-3"><small>Tracking Number</small></div>
										<div class="col-sm-3"><small>Date & Time</small></div>
										<div class="col-sm-3"><small>Name</small></div>
										<div class="col-sm-2"><small>Department</small></div>
										<div class="col-sm-1">&nbsp;&nbsp;</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $c = 100; ?>
					<?php $token = Token::generate();?>
					<?php foreach($datas2->results() as $data): ?>
						<?php if($data->id == Input::get('id')): ?>
							<?php $color = "danger"; ?>
						<?php else: ?>	
							<?php $color = "success"; ?>
						<?php endif; ?>
						<?php $c++; ?>
						<div class="panel panel-<?php echo $color; ?>">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion<?php echo $c; ?>" href="#collapse<?php echo $c; ?>">
									<div class="row">
										<div class="col-sm-3"><small><?php echo escape($data->id); ?></small></div>
										<div class="col-sm-3">
											<?php $date = date('M j, Y g:ia', strtotime($data->date)); ?>
											<small>
												<?php echo escape($date); ?>
											</small>
										</div>
										<div class="col-sm-3">
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
										<div class="col-sm-2">
											<small>
												<?php if($data->department == 1): ?>
													Accounting
												<?php elseif($data->department == 2): ?>
													Marketing
												<?php elseif($data->department == 3): ?>	
													Human Resource
												<?php elseif($data->department == 4): ?>
													App Dev
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
												<?php elseif($data->application == 3): ?>
													CARS
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
										<div class="col-sm-2"><p><small><strong>Details</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->details); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>Special Instruction</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->instruction); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>File</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->file); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-10">
											<form action="checkinapp.php" method="post" class="form-horizontal input-sm">
												<div class="form-group">
													<label for="note" class="col-sm-1 control-label input-sm">Note</label>
													<div class="col-sm-6">
      													<textarea id="note" name="note" style="resize:none" class="form-control input-sm" placeholder="Note is required." rows="1"><?php echo escape(Input::get('note')); ?></textarea>
  													</div>
    												<div class="col-sm-3">
    													<select id="status" name="status" class="form-control input-sm">
															<option value="0" select="selected"></option>
															<option value="1">Approved</option>
															<option value="2">Disapproved</option>
      													</select>
   				 									</div>
   				 									<div class="col-sm-2">
   				 										<input type="hidden" id="id" name="id" value="<?php echo escape($data->id); ?>">
														<input type="hidden" name="token" value="<?php echo $token;?>">
   				 										<button type="submit" id="process" name="process" class="btn btn-primary input-sm">Process</button>
   				 									</div>	
												</div>	
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					<?php endforeach; ?>	
				</div>	
			</div>
		<?php endif; ?>
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
										<div class="col-sm-3"><small>Name</small></div>
										<div class="col-sm-2"><small>Department</small></div>
										<div class="col-sm-1">&nbsp;&nbsp;</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $c = 1; ?>
					<?php foreach($datas->results() as $data): ?>
						<?php if($data->id == Input::get('id')): ?>
							<?php $color = "danger"; ?>
						<?php else: ?>	
							<?php $color = "success"; ?>
						<?php endif; ?>
						<?php $c++; ?>
						<div class="panel panel-<?php echo $color; ?>">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion<?php echo $c; ?>" href="#collapse<?php echo $c; ?>">
									<div class="row">
										<div class="col-sm-3"><small><?php echo escape($data->id); ?></small></div>
										<div class="col-sm-3">
											<?php $date = date('M j, Y g:ia', strtotime($data->date)); ?>
											<small>
												<?php echo escape($date); ?>
											</small>
										</div>
										<div class="col-sm-3">
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
										<div class="col-sm-2"><p><small><strong>Details</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->details); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>Special Instruction</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->instruction); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"><p><small><strong>File</strong></small></p></div>
											<div class="col-sm-10">
											<small>
												<?php echo escape($data->file); ?>
											</small>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-6">
											<form action="checkinapp.php" method="post" class="form-horizontal input-sm">
												<div class="form-group">
													<label for="assign" class="col-sm-4 control-label input-sm">Assign To</label>
    												<div class="col-sm-4">
    													<select id="assign" name="assign" class="form-control input-sm">
															<option value="0" select="selected"></option>
																<?php if($users->count()): ?>
																	<?php foreach($users->results() as $user): ?>
																		<?php if($user->group == 1): ?>
																			<?php echo "<option value=\"{$user->id}\">" . $user->name . "</option>"; ?>
																		<?php endif; ?>
																	<?php endforeach; ?>
																<?php endif; ?>
      													</select>
   				 									</div>
   				 									<div class="col-sm-4">
   				 										<input type="hidden" id="id" name="id" value="<?php echo escape($data->id); ?>">
														<input type="hidden" name="token" value="<?php echo $token;?>">
   				 										<button type="submit" id="assigned" name="assigned" class="btn btn-primary input-sm">Assign</button>
   				 									</div>	
												</div>	
											</form>
										</div>
										<div class="col-sm-4"></div>
									</div>	
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
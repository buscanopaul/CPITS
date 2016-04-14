<?php require_once 'controllers/checkin.php'; ?>
<?php require_once 'template/header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Checkin Form</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<form action="checkin.php" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label for="department" class="col-sm-2 control-label">Department</label>
				<div class="col-sm-3 <?php if(isset($_POST['department']) && $_POST['department'] == 0) echo "has-error";?>">
					<select id="department" name="department" class="form-control">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('department') == 1) echo 'selected="selected"'; ?>>Accounting</option>
						<option value="2" <?php if(Input::get('department') == 2) echo 'selected="selected"'; ?>>Marketing</option>
						<option value="3" <?php if(Input::get('department') == 3) echo 'selected="selected"'; ?>>Human Resource</option>
						<option value="4" <?php if(Input::get('department') == 4) echo 'selected="selected"'; ?>>App Dev</option>
					</select>
				</div>
				<label for="application" class="col-sm-2 control-label">Application</label>
				<div class="col-sm-3 <?php if(isset($_POST['application']) && $_POST['application'] == 0) echo "has-error";?>">
					<select id="application" name="application" class="form-control">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('application') == 1) echo 'selected="selected"'; ?>>QnE Business Solutions</option>
						<option value="2" <?php if(Input::get('application') == 2) echo 'selected="selected"'; ?>>MSI Payroll XP</option>
						<option value="3" <?php if(Input::get('application') == 3) echo 'selected="selected"'; ?>>CARS</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="type" class="col-sm-2 control-label">Type</label>
				<div class="col-sm-3 <?php if(isset($_POST['type']) && $_POST['type'] == 0) echo "has-error";?>">
					<select id="type" name="type" class="form-control">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('type') == 1) echo 'selected="selected"'; ?>>Documentation</option>
						<option value="2" <?php if(Input::get('type') == 2) echo 'selected="selected"'; ?>>Source Code</option>
						<option value="3" <?php if(Input::get('type') == 3) echo 'selected="selected"'; ?>>File (Related File)</option>
					</select>
				</div>
				<!--<label for="priority" class="col-sm-2 control-label">Priority</label>
				<div class="col-sm-3">
					<select id="priority" name="priority" class="form-control">
						<option value="0" select="selected"></option>	
						<option value="1">Standard</option>
						<option value="2">Urgent</option>
					</select>
				</div>-->
 			</div>
			<div class="form-group">
				<label for="details" class="col-sm-2 control-label">Details</label>
				<div class="col-sm-8 <?php if(isset($_POST['details']) && $_POST['details'] == "") echo "has-error";?>">
					<textarea id="details" name="details" style="resize:none" class="form-control" placeholder="Required field." cols="100" rows="3" wrap="hard"><?php echo escape(Input::get('details')); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="instruction" class="col-sm-2 control-label">Special Instruction</label>
				<div class="col-sm-8 <?php if(isset($_POST['instruction']) && $_POST['instruction'] == "") echo "has-error";?>">
					<textarea id="instruction" name="instruction" style="resize:none" class="form-control" placeholder="Required field." cols="100" rows="3" wrap="hard"><?php echo escape(Input::get('instruction')); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="file" class="col-sm-2 control-label">Attach File</label>
				<div class="col-sm-8 <?php if(isset($_FILES['file']['name']) && $_FILES['file']['name'] == "") echo "has-error";?>">
					<input type="file" name="file" id="file" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-5">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				</div>
				<div class="col-sm-2">
					<button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
				</div>
				<div class="col-sm-3">
					<?php require_once 'template/message.php'; ?>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</form>
	</div><!-- /.row -->
</div><!-- /#page-wrapper -->
<?php require_once 'template/footer.php'; ?>



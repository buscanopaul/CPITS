<?php require_once 'controllers/checkout.php'; ?>
<?php require_once 'template/header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Checkout Form</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<form action="checkout.php" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label for="department" class="col-sm-2 control-label">Department</label>
				<div class="col-sm-3 <?php if(isset($_POST['department']) && $_POST['department'] == 0) echo "has-error";?>">
					<select id="department" name="department" class="form-control">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('department') == 1) echo 'selected="selected"'; ?>>Accounting</option>
						<option value="2" <?php if(Input::get('department') == 2) echo 'selected="selected"'; ?>>Marketing</option>
						<option value="3" <?php if(Input::get('department') == 3) echo 'selected="selected"'; ?>>Human Resource</option>
					</select>
				</div>
				<label for="application" class="col-sm-2 control-label">Application</label>
				<div class="col-sm-3 <?php if(isset($_POST['application']) && $_POST['application'] == 0) echo "has-error";?>">
					<select id="application" name="application" class="form-control">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('application') == 1) echo 'selected="selected"'; ?>>QnE Business Solutions</option>
						<option value="2" <?php if(Input::get('application') == 2) echo 'selected="selected"'; ?>>MSI Payroll XP</option>
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
				<label for="file" class="col-sm-2 control-label">File Name</label>
				<div class="col-sm-8 <?php if(isset($_POST['file']) && $_POST['file'] == "") echo "has-error";?>">
					<textarea id="file" name="file" style="resize:none" class="form-control" placeholder="Required field." cols="100" rows="3" wrap="hard"><?php echo escape(Input::get('file')); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="version" class="col-sm-2 control-label">Version Date</label>
				<div class="col-sm-8 <?php if(isset($_POST['version']) && $_POST['version'] == "") echo "has-error";?>">
					<textarea id="version" name="version" style="resize:none" class="form-control" placeholder="Required field." cols="100" rows="3" wrap="hard"><?php echo escape(Input::get('version')); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="note" class="col-sm-2 control-label">Note</label>
				<div class="col-sm-8">
					<textarea id="note" name="note" style="resize:none" class="form-control" placeholder="" cols="100" rows="3" wrap="hard"><?php echo escape(Input::get('note')); ?></textarea>
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



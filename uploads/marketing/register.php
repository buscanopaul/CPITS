<?php require_once 'controllers/register.php'; ?>
<?php require_once 'template/header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Register User</h1>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
	<div class="row">
		<form action="register.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-3 <?php if(isset($_POST['username']) && $_POST['username'] == "") echo "has-error";?>">
					<input type="text" name="username" id="username"  value="<?php echo escape(Input::get('username')); ?>" class="form-control input-sm" placeholder="" maxlength="100" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="Password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-3 <?php if(isset($_POST['Password']) && $_POST['Password'] == "") echo "has-error";?>">
					<input type="password" name="Password" id="Password" class="form-control input-sm" placeholder="" maxlength="100" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="rePassword" class="col-sm-2 control-label">Re-Enter Password</label>
				<div class="col-sm-3 <?php if(isset($_POST['rePassword']) && $_POST['rePassword'] == "") echo "has-error";?>">
					<input type="password" name="rePassword" id="rePassword" class="form-control input-sm" placeholder="" maxlength="100" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-3 <?php if(isset($_POST['name']) && $_POST['name'] == "") echo "has-error";?>">
					<input type="text" name="name" id="name"  value="<?php echo escape(Input::get('name')); ?>" class="form-control input-sm" placeholder="" maxlength="100" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="access" class="col-sm-2 control-label">User Group</label>
				<div class="col-sm-3 <?php if(isset($_POST['group']) && $_POST['group'] == 0) echo "has-error";?>">
					<select id="group" name="group" class="form-control input-sm">
						<option value="0"></option>	
						<option value="1" <?php if(Input::get('group') == 1) echo 'selected="selected"'; ?>>Admin User</option>
						<option value="2" <?php if(Input::get('group') == 2) echo 'selected="selected"'; ?>>Regular User</option>
					</select>
				</div>
			</div>	
			<div class="form-group">
				<div class="col-sm-2">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				</div>
				<div class="col-sm-3">
					<button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm btn-block">Register</button>
				</div>
				<div class="col-sm-7"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-3">
					<?php require_once 'template/message.php'; ?>
				</div>
			</div>	
		</form>
	</div>
</div><!-- /#page-wrapper -->
<?php require_once 'template/footer.php'; ?>
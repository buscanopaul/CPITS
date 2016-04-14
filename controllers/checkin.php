<?php 
require_once 'core/init.php';

$user = new User();




if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}



if(!$user->data()->group == 2)
{
	Redirect::to('home.php');
}



if(Input::exists())
{
			
	//2/5/2016 paul							
	$verify = DB::getInstance()->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'cpits' AND TABLE_NAME = 'checkin'");
					
	if(!$verify->count())
	{
		
		Redirect::to('index.php');

	}
	else
	{
			foreach($verify->results() as $verifys)
			{
		
				$tn = $verifys->AUTO_INCREMENT;

		
			}
				
	}
	//2/5/2016 paul

	$_POST['file'] = $_FILES['file']['name'];
	
	if(Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'department' => array(
				'name' => 'Department',
				'required' => true
			),
			'application' => array(
				'name' => 'Application',
				'required' => true
			),
			'type' => array(
				'name' => 'Type',
				'required' => true
			),
			/**'priority' => array(
				'name' => 'Priority',
				'required' => true
			),**/
			'details' => array(
				'name' => 'Details',
				'required' => true
			),
			'instruction' => array(
				'name' => 'Special Instruction',
				'required' => true
			),
			'file' => array(
				'name' => 'Attach File',
				'required' => true
			)
		));
		
		if($validation->passed())
		{
			$uploadErrors = array(
				UPLOAD_ERR_OK => "No errors.",
				UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
				UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
				UPLOAD_ERR_PARTIAL => "Partial upload.",
				UPLOAD_ERR_NO_FILE => "No file.",
				UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
				UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
				UPLOAD_ERR_EXTENSION => "File upload stopped by extension.");
			
			if ($_FILES["file"]["error"] > 0)
  			{
  				Session::flash('error', $upload_errors[$_FILES["file"]["error"]] . ".");
  			}
			else 
			{
				if(Input::get('department') == 1)
				{
					$folder = "accounting";
				}
				elseif(Input::get('department') == 2)
				{
					$folder = "marketing";
				}
				elseif(Input::get('department') == 3)
				{
					$folder = "humanresource";
				}
				else
				{
					$folder = "";
				}
				
				$fileName = $_FILES["file"]["name"];
				
				if(file_exists("uploads/$folder/" . $fileName))
				{
					Session::flash('error', $fileName . " already exists.");	
				}
				else 
				{
					$checkin = New Checkin();

				
					try
					{
						$checkin->create('checkin', array(
							'trackingNum' => 'CI' . $tn, //2/5/2016 paul
							'date' => date('Y-m-d H:i:s'),
							'userId' => $user->data()->id,
							'status' => 1,
							'department' => Input::get('department'),
							'application' => Input::get('application'),
							'type' => Input::get('type'),
							//'priority' => Input::get('priority'),
							'details' => Input::get('details'),
							'instruction' => Input::get('instruction'),
							'file' => Input::get('file')
						));
						
						move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/$folder/" . $fileName);
						unset($_POST);
						Session::flash('success', 'Request submitted.');
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				
				}
			}
		}
		else 
		{
			Session::flash('error', array_values($validation->errors())[0] . ".");
		}
	}
	
}










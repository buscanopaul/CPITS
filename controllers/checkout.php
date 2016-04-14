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

	//2/9/2016 paul							
	$verify = DB::getInstance()->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'cpits' AND TABLE_NAME = 'checkout'");
					
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
	//2/9/2016 paul

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
			'file' => array(
				'name' => 'File Name',
				'required' => true
			),
			/**'note' => array(
				'name' => 'Note',
				'required' => true
			),**/
			'version' => array(
				'name' => 'Version Date',
				'required' => true
			)
		));
		
		if($validation->passed())
		{
			$checkin = New Checkout();
			
			try
			{
				$checkin->create('checkout', array(
					'trackingNum' => 'CO' . $tn, //2/9/2016 paul
					'date' => date('Y-m-d H:i:s'),
					'userId' => $user->data()->id,
					'status' => 1,
					'department' => Input::get('department'),
					'application' => Input::get('application'),
					'type' => Input::get('type'),
					'file' => Input::get('file'),
					'note' => Input::get('note'),
					'version' => Input::get('version')
				));
				
				unset($_POST);
				Session::flash('success', 'Request sumbitted.');
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		else 
		{
			Session::flash('error', array_values($validation->errors())[0] . ".");
		}
	}
	
}
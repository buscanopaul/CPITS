<?php
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}

if(!$user->data()->group == 1)
{
	Redirect::to('home.php');
}

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'name' => 'Username',
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'//table name
			),
			'Password' => array(
				'name' => 'Password',
				'required' => true,
				'min' => 8,
				'max' => 32
			),
			'rePassword' => array(
				'name' => 'Re-type Password',
				'required' => true,
				'matches' => 'Password' //match with password
			),
			'name' => array(
				'name' => 'Name',
				'required' => true,
				'min' => 2,
				'max' => 50
			),
			'group' => array(
			'name' => 'User Group',
			'required' => true
			)
		));
		
		if($validation->passed())
		{
			$user = new User();
			$salt = Hash::salt(32);
			
			try 
			{
				$user->create('users', array(
					'username' => Input::get('username'),
					'Password' => Hash::make(Input::get('Password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => Input::get('group')
				));
				
				unset($_POST);
				Session::flash('success', 'Registration successful.');
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
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
	if(isset($_POST['process']))
	{
		if(Token::check(Input::get('token')))
		{
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'note' => array(
					'name' => 'Note',
					'required' => true
				),
				'status' => array(
					'name' => 'Approval',
					'required' => true
				)
			));
			
			if($validation->passed())
			{
				$verify = DB::getInstance()->query("SELECT id FROM checkout WHERE id = ? AND status = ?", array(Input::get('id'), 2));
				
				if(!$verify->count())
				{
					Session::flash('error', 'Request has already been processed.');
				}
				else
				{
					$status = 2 + input::get('status');
					try
					{
						DB::getInstance()->update('checkout', Input::get('id'), array(
							'status' => $status,
							'processDate' => date('Y-m-d H:i:s'),
							'processNote' => input::get('note')
						));
	
						unset($_POST);
						Session::flash('success', 'Request has been processed.');
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}
			}
			else 
			{
				Session::flash('error', array_values($validation->errors())[0] . ".");
			}
		}
	}
	
	if(isset($_POST['assigned']))
	{
		if(Token::check(Input::get('token')))
		{
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'assign' => array(
					'name' => 'Assign To',
					'required' => true
				)
			));
		
			if($validation->passed())
			{
				$verify = DB::getInstance()->query("SELECT id FROM checkout WHERE id = ? AND status = ?", array(Input::get('id'), 1));
				
				if(!$verify->count())
				{
					Session::flash('error', 'Request has already been assigned.');
					
				}
				else
				{
					try
					{
						DB::getInstance()->update('checkout', Input::get('id'), array(
							'status' => 2,
							'tagDate' => date('Y-m-d H:i:s'),
							'processId' => $user->data()->id
						));
	
						unset($_POST);
						Session::flash('success', 'Request Assigned.');
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}
			}
			else 
			{
				Session::flash('error', array_values($validation->errors())[0] . ".");
			}
		}
	}
}

$datas = DB::getInstance()->get('checkout', array('status', '=', '1'));
$datas2 = DB::getInstance()->query("SELECT * FROM checkout WHERE processId = ? AND status = ?", array($user->data()->id, 2));
$users = DB::getInstance()->query("SELECT * FROM users");



if(!$datas->count() AND !$datas2->count())
{
	Session::flash('record', 'No current record to process.');
}

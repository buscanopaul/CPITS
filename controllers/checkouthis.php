<?php 
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}

if($user->data()->group == 1)
{
	$datas = DB::getInstance()->query("SELECT * FROM checkout ORDER BY 1 DESC");
}
elseif ($user->data()->group == 2)
{
	$datas = DB::getInstance()->query("SELECT * FROM checkout WHERE userId = ? ORDER BY 1 DESC", array($user->data()->id));
}
else 
{
	$datas = "";
}

$users = DB::getInstance()->query("SELECT * FROM users");

if(!$datas->count())
{
	Session::flash('record', 'No current checkout.');
}

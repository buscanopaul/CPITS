<?php 
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}

if($user->data()->group == 1)
{
	$datas = DB::getInstance()->get('checkin', array('status', '=', '1'));
	$datas2 = DB::getInstance()->query("SELECT * FROM checkin WHERE processId = ? AND status = ?", array($user->data()->id, 2));
	$datas3 = DB::getInstance()->get('checkout', array('status', '=', '1'));
	$datas4 = DB::getInstance()->query("SELECT * FROM checkout WHERE processId = ? AND status = ?", array($user->data()->id, 2));
}
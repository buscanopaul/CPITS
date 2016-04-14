<?php 
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}



$datas = DB::getInstance()->get('checkin', array('trackingNum', '=', Input::get('search'))); //2/9/2015 paul

$users = DB::getInstance()->query("SELECT * FROM users");



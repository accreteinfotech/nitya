<?php
include 'include/connect.php';

$username = $_POST['username'];
$password = $_POST['password'];


	$sql = $link->rawQueryOne("select * from admin where admin_username = ? and admin_password = ?",Array($username,$password));
	if($link->count > 0)
	{
		session_start();
		
		$_SESSION['admin_id'] = $sql['admin_id'];
		//header('location:dashboard/index.php');
		echo "";
	}
	elseif($password==null || $username==null)
	{
		echo "Username or Password is Blank !!";
	}
	else 
	{
		echo "Invalid Username Or Password !!";
	}
	if(!empty($_POST['remember']))
{
	setcookie('user',$username,time() + (365 * 24 * 60 * 60));
	setcookie('pwd',$password,time() + (365 * 24 * 60 * 60));
}
else
{
	setcookie('user','');
	setcookie('pwd','');
}

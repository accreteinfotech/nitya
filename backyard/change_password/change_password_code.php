<?php
session_start();
include '../include/connect.php';

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$c_password = $_POST['c_password'];

	$sql = $link->rawQueryOne("select * from admin where admin_password = ?",Array($current_password));
	if($link->count > 0)
	{
		if($current_password==null || $new_password==null || $c_password==null)
		{
			echo "Empty Fields";
		}
		else if($c_password!=$new_password)
		{
			echo "New Password And Confirm Password Doesn't Match";
		}
		else
		{
			$link->where("admin_id",$_SESSION['admin_id']);
			$ab=$link->update("admin",array("admin_password"=>$c_password));
			if($ab)
			{
				echo "";
			}
		}
		
	}
	else if($current_password==null || $new_password==null || $c_password==null)
	{
		echo "Empty Fields";
	}
	else
	{
		echo "Invalid Current Password";
	}
	?>
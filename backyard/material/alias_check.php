<?php
	include '../include/connect.php';
	session_start();
	
	if(isset($_REQUEST['alias']))
	{
	if($_REQUEST['alias']!="" || $_REQUEST['alias']!=0 || $_REQUEST['alias']!=null)
	{
		$alias=$_REQUEST['alias'];
		$sql=$link->rawQueryOne("select * from material where material_name = '$alias'");
		if($link->count == 0)
		{
			echo "new";
		}
		else
		{
			echo "already";
		}
	}
	}
	else
	{
		$alias=$_REQUEST['edit_alias'];
		$id=$_REQUEST['id'];
		$sql=$link->rawQueryOne("select * from material where material_name = '$alias' and material_id != ?",array($id));
		if($link->count == 0)
		{
			echo "new";
		}
		else
		{
			echo "already";
		}
	}
	
?>
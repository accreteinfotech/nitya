<?php
	include '../include/connect.php';
	session_start();
	
	if(isset($_REQUEST['alias']))
	{
	if($_REQUEST['alias']!="" || $_REQUEST['alias']!=0 || $_REQUEST['alias']!=null)
	{
		$alias=str_replace(' ', '-',$_REQUEST['alias']);
		$sql=$link->rawQueryOne("select * from product where product_alias LIKE ?",array($alias));
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
		$alias=str_replace(' ', '-',$_REQUEST['edit_alias']);
		$id=$_REQUEST['id'];
		$sql=$link->rawQueryOne("select * from product where product_alias LIKE ? and product_id != ?",array($alias,$id));
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
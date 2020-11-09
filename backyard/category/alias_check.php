<?php
	include '../include/connect.php';
	session_start();
	
	if(isset($_REQUEST['alias']))
	{
	if($_REQUEST['alias']!="" || $_REQUEST['alias']!=0 || $_REQUEST['alias']!=null)
	{
		$alias=str_replace(' ', '-',$_REQUEST['alias']);
		$sql=$link->rawQueryOne("select * from category where category_alias LIKE '$alias' and category_delete=0");
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
		$alias_id=$_REQUEST['id'];
		$sql=$link->rawQueryOne("select * from category where category_alias LIKE '$alias' and category_id !=?",array($alias_id));
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
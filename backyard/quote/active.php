<?php
	include '../include/connect.php';
	$cid=$_GET['pid'];
	
	$link->where("quote_id",$cid);
	$a=$link->update("quote",array("quote_active"=>1));
	
	if($a)
	{
		header("location:View-Quote");
	}
?>
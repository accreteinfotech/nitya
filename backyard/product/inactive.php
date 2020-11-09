<?php
	include '../include/connect.php';
	$cid=$_GET['pid'];
	
	$link->where("product_id",$cid);
	$a=$link->update("product",array("is_active1"=>0));
	
	if($a)
	{
		header("location:../product/View-Product");
		
	}
?>
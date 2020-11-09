<?php
	include '../include/connect.php';
	$cid=$_GET['pid'];
	
	$link->where("coupon_id",$cid);
	$a=$link->update("coupon",array("coupon_active"=>0));
	
	if($a)
	{
		header("location:../coupon/View-Coupon");
	}
?>
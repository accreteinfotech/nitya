<?php
	include '../include/connect.php';
	$cid=$_GET['cid'];
	
	$link->where("blog_id",$cid);
	$a=$link->update("blog",array("is_active"=>0));
	
	if($a)
	{
		header("location:View-Blogs");
	}
?>
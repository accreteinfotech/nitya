<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$pid=$_REQUEST['pid'];
		$link->where('product_price_id',$id);
		$a=$link->delete("product_price");
		if($a)
		{
			header("location:view_product_price.php?pid=".$pid."");
		}
		
?>
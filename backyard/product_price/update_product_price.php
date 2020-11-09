<?php
	include '../include/connect.php';
	
	$product_price_id=$_POST['product_price_id'];
	$product_id=$_POST['product_id'];
	//$material_id=$_POST['material_id'];
	$inventory_id=$_POST['inventory_id'];
	$product_price_amount=$_POST['product_price_amount'];
	$color_id = $_POST['color_id'];
	
	
		$link->where('product_price_id',$product_price_id);
	$c=$link->update('product_price',array("product_id"=>$product_id,"inventory_id"=>$inventory_id,"color_id"=>$color_id));
		if($c)
				{
					header('location:view_product_price.php?pid='.$product_id.'');
				}
				
		
?>
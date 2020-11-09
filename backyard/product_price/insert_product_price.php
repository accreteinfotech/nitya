<?php
include "../include/connect.php";

	
	$inventory_id=$_POST['inventory_id'];
	//$material_id=$_POST['material_id'];
	$product_id=$_POST['product_id'];
	//$product_price_amount=$_POST['product_price_amount'];
	$color_id = $_POST['color_id'];
	
	$ad=$link->insert("product_price",array("inventory_id"=>$inventory_id,"product_id"=>$product_id,"color_id"=>$color_id));
	
	if($ad)
	{
		header('location:view_product_price.php?pid='.$product_id.'');
	}
?>
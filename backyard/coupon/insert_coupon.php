<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	$coupon_name=$_REQUEST['coupon_name'];
	$coupon_discount=$_REQUEST['coupon_discount'];
	
	$ad=$link->insert("coupon",array("coupon_name"=>$coupon_name,"coupon_discount"=>$coupon_discount));
	
	if($ad)
		{
			header("location:View-Coupon");
		}
		else
		{
		    echo "fail";
		}
	
?>
<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$coupon_name=$_POST['coupon_name'];
	$coupon_discount=$_POST['coupon_discount'];
	$coupon_id=$_POST['coupon_id'];
	
			$link->where('coupon_id',$coupon_id);
			$c=$link->update('coupon',array("coupon_name"=>$coupon_name,"coupon_discount"=>$coupon_discount));
			if($c)
			{
				header('location:View-Coupon');
			}
			else
			{
				echo "Something Wrong";
			}
?>
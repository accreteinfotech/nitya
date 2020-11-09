<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('coupon_id',$id);
		$a=$link->delete("coupon");
		if($a)
		{
			header("location:../View-Coupon");
		}
		
?>
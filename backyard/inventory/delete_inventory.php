<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('inventory_id',$id);
		$a=$link->update("inventory",array("inventory_delete"=>1));
		if($a)
		{
			header("location:../View-Inventory");
		}
		
?>
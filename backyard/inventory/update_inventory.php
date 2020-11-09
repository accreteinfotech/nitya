<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$inventory_type=$_POST['inventory_type'];
	$inventory_id=$_POST['inventory_id'];
	
			$link->where('inventory_id',$inventory_id);
			$c=$link->update('inventory',array("inventory_type"=>$inventory_type));
			if($c)
			{
				header('location:View-Inventory');
			}
			else
			{
				echo "Something Wrong";
			}
?>
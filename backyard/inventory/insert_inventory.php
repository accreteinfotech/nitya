<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	$inventory_type=$_REQUEST['inventory_type'];
	echo $inventory_type;
	
	$ad=$link->insert("inventory",array("inventory_type"=>$inventory_type));
	
	if($ad)
		{
			header("location:View-Inventory");
		}
		else
		{
		    echo "fail";
		}
	
?>
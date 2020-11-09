<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	$material_name=$_REQUEST['material_name'];
	//echo $inventory_type;
	
	$ad=$link->insert("material",array("material_name"=>$material_name));
	
	if($ad)
		{
			header("location:View-Material");
		}
		else
		{
		    echo "fail";
		}
	
?>
<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$material_name=$_POST['material_name'];
	$material_id=$_POST['material_id'];
	
			$link->where('material_id',$material_id);
			$c=$link->update('material',array("material_name"=>$material_name));
			if($c)
			{
				header('location:View-Material');
			}
			else
			{
				echo "Something Wrong";
			}
?>
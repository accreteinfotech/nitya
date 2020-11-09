<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('material_id',$id);
		$a=$link->update("material",array("material_delete"=>1));
		if($a)
		{
			header("location:../View-Material");
		}
		
?>
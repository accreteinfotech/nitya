<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		$id=$_REQUEST['cid'];
		$link->where('color_id',$id);
		$a=$link->delete("color");
		if($a)
		{
			header("location:../View-Color");
		}
		
?>
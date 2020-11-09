<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('admission_id',$id);
		$a=$link->delete("admission");
		if($a)
		{
			header("location:view_admission.php");
		}
		
?>
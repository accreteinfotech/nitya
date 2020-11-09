<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('category_id',$id);
		$a=$link->update("category",array("category_delete"=>1));
		if($a)
		{
			header("location:../View-Category");
		}
		
?>
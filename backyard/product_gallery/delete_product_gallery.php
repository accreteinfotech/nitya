<?php
	ob_start();
?>
<?php
	
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$pid=$_REQUEST['aid'];
		$check=$link->rawQueryone("select * from product_gallery where product_gallery_id=?",array($id));
		if($check)
		{
			unlink("../images/product_gallery_thumb_image/".$check['product_gallery_thumb_image']);
			unlink("../images/product_gallery_large_image/".$check['product_gallery_large_image']);
			
			$link->where('product_gallery_id',$id);
			$a=$link->delete("product_gallery");
			header("location:../../View-Product-Gallery/".$pid);
		}

?>
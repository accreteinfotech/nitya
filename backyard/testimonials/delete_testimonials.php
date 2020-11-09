<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('review_id',$id);
		$a=$link->delete("review");
		if($a)
		{
			header('location:../View-Testimonials');
		}
		
?>
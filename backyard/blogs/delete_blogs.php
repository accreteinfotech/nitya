<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('blog_id',$id);
		$a=$link->delete("blog");
		if($a)
		{
			header("location:../View-Blogs");
		}
		
?>
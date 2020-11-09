<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$category_id=$_POST['category_id'];
	$category_title = $_POST['category_title'];
	$category_meta_title = $_POST['category_meta_title'];
	$category_meta_description = $_POST['category_meta_description'];
	$category_keywords= $_POST['category_keywords'];
	$category_og_title = $_POST['category_og_title'];
	$category_og_description = $_POST['category_og_description'];
	$category_og_url = $_POST['category_og_url'];
	
			$link->where('category_id',$category_id);
			$c=$link->update('category',array("category_title"=>$category_title,"category_meta_title"=>$category_meta_title,"category_meta_description"=>$category_meta_description,"category_keywords"=>$category_keywords,"category_og_title"=>$category_og_title,"category_og_description"=>$category_og_description,"category_og_url"=>$category_og_url));
			
			header('location:View-Category');
?>
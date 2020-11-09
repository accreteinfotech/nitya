<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$page_seo_id=$_POST['page_seo_id'];
	$page_seo_title=$_POST['page_seo_title'];
	$page_seo_description=$_POST['page_seo_description'];
	$page_seo_keywords=$_POST['page_seo_keywords'];
	$page_seo_author=$_POST['page_seo_author'];
	$page_seo_og_title=$_POST['page_seo_og_title'];
	$page_seo_og_description=$_POST['page_seo_og_description'];
	$page_seo_og_url=$_POST['page_seo_og_url'];
	
	$link->where('page_seo_id',$page_seo_id);
	$c=$link->update('page_seo',array("page_seo_og_url"=>$page_seo_og_url,"page_seo_og_description"=>$page_seo_og_description,"page_seo_og_title"=>$page_seo_og_title,"page_seo_title"=>$page_seo_title,"page_seo_author"=>$page_seo_author,"page_seo_keywords"=>$page_seo_keywords,"page_seo_title"=>$page_seo_title,"page_seo_description"=>$page_seo_description));
	if($c)
	{
		header('location:View-Seo');	
	}
			
?>
<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	
	$product_id=$_POST['product_id'];
	
	//SEO Details
	$seo_title=$_POST['seo_title'];
	$seo_meta_title=$_POST['seo_meta_title'];
	$seo_meta_description=$_POST['seo_meta_description'];
	$seo_keywords=$_POST['seo_keywords'];
	
	$product_og_title=$_POST['product_og_title'];
	$product_og_description=$_POST['product_og_description'];
	$product_og_url=$_POST['product_og_url'];
	
	$link->where("product_id",$product_id);
	$ad=$link->update("product",array("product_og_title"=>$product_og_title,"product_og_description"=>$product_og_description,"product_og_url"=>$product_og_url,"seo_title"=>$seo_title,"seo_meta_title"=>$seo_meta_title,"seo_meta_description"=>$seo_meta_description,"seo_keywords"=>$seo_keywords));
	
	if($ad)
		{
			header("location:View-Product");
		}
?>
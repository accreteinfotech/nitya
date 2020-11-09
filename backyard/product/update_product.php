<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	$product_price=$_POST['product_price'];
		$product_shipping_charge=$_POST['product_shipping_charge'];
	$product_name=$_POST['product_name'];
	$product_alias= str_replace(' ', '-',$_POST['product_alias']);
	$product_code=$_POST['product_code'];
	
	$product_description=$_POST['product_description'];
	$product_id=$_POST['product_id'];
	$product_short_desc = $_POST['product_short_desc'];
	
	$product_total_qty=$_POST['product_total_qty'];
	
	
	$additional_information=$_POST['additional_information'];
	
	//SEO Details
	$seo_title=$_POST['seo_title'];
	$seo_meta_title=$_POST['seo_meta_title'];
	$seo_meta_description=$_POST['seo_meta_description'];
	$seo_keywords=$_POST['seo_keywords'];
	
	$link->where("product_id",$product_id);
	$ad=$link->update("product",array("product_alias"=>$product_alias,"product_code"=>$product_code,"seo_title"=>$seo_title,"seo_meta_title"=>$seo_meta_title,"seo_meta_description"=>$seo_meta_description,"seo_keywords"=>$seo_keywords,"product_total_qty"=>$product_total_qty,"additional_information"=>$additional_information,"product_shipping_charge"=>$product_shipping_charge,"product_name"=>$product_name,"product_price"=>$product_price,"product_description"=>$product_description,"product_short_desc"=>$product_short_desc));
	
	    if($ad)
		{
			//header("location:View-Product");
		}
	$img=$_FILES['product_image']['name'];
		if($img != null)
		{
			$check2=$link->rawQueryone("select * from product where product_id=?",array($product_id));
			unlink("../images/product_image/".$check2['product_image']);
			$ext=pathinfo($img,PATHINFO_EXTENSION);
			$pimage="product_image".$product_id.'.'.$ext;	
			
				if(move_uploaded_file($_FILES['product_image']['tmp_name'],"../images/product_image/".$pimage))
				{
					$link->where('product_id',$product_id);
					$a1=$link->update("product",array("product_image"=>$pimage));
					header("location:View-Product");
				}
		}
		header("location:View-Product");
?>
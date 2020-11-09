<?php
	ob_start();
?>
<?php
include "../include/connect.php";
session_start();
	$product_name=$_POST['product_name'];
	$product_alias= str_replace(' ', '-',$_POST['product_alias']);
	$product_code=$_POST['product_code'];
	$product_price=$_POST['product_price'];
	$product_description=$_POST['product_description'];
	$product_shipping_charge=$_POST['product_shipping_charge'];
	$product_total_qty=$_POST['product_total_qty'];
	$product_short_desc = $_POST['product_short_desc'];
	
	$additional_information=$_POST['additional_information'];
	
	//SEO Details
	$seo_title=$_POST['seo_title'];
	$seo_meta_title=$_POST['seo_meta_title'];
	$seo_meta_description=$_POST['seo_meta_description'];
	$seo_keywords=$_POST['seo_keywords'];
	
	$ad=$link->insert("product",array("product_alias"=>$product_alias,"product_code"=>$product_code,"seo_title"=>$seo_title,"seo_meta_title"=>$seo_meta_title,"seo_meta_description"=>$seo_meta_description,"product_short_desc"=>$product_short_desc,"seo_keywords"=>$seo_keywords,"product_total_qty"=>$product_total_qty,"additional_information"=>$additional_information,"product_shipping_charge"=>$product_shipping_charge,"product_name"=>$product_name,"product_price"=>$product_price,"product_description"=>$product_description));
	
	if($ad)
		{
		    	
			   	$img=$_FILES['product_image']['name'];
				if($img != null)
				{
					$ext=pathinfo($img,PATHINFO_EXTENSION);
					$pimage="product_image".$ad.'.'.$ext;	
					
						if(move_uploaded_file($_FILES['product_image']['tmp_name'],"../images/product_image/".$pimage))
						{
							$link->where('product_id',$ad);
							$a1=$link->update("product",array("product_image"=>$pimage));
							if($a1)
							{
								header("location:View-Product");
							}
						//	header("location:View-Product");
						}
				}
				foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
        		{
        		  //  echo $_FILES["files"]["name"][$key];
        		    $x=$link->insert('product_gallery',array('product_id'=>$ad));
        			if($x)
        			{
        				$iname = $_FILES["files"]["name"][$key];
        				$ext = pathinfo($iname, PATHINFO_EXTENSION);
        				$y="product_gallery_thumb_image".$x.".".$ext;
        			 
        			    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key],"../images/product_gallery_thumb_image/".$y))
        				{
        					
        					$link->where('product_gallery_id',$x);
        					$z=$link->update('product_gallery',array('product_gallery_thumb_image'=>$y));
        					if($z)
        					{
        						header('location:View-Product');
                			}
        				}
        			}	
        		}
		}
?>
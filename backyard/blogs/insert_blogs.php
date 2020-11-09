<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	
	$blog_title=$_POST['blog_title'];
	$blog_alias= str_replace(' ', '-',$_POST['blog_alias']);
	$blog_name=$_POST['blog_name'];
	$blog_description=$_POST['blog_description'];
	$blog_writer=$_POST['blog_writer'];
	//$meta_title=$_POST['meta_title'];
	$meta_description=$_POST['meta_description'];
	$meta_keyword=$_POST['meta_keyword'];
	$blog_short_desc=$_POST['blog_short_desc'];
	
	$ad=$link->insert("blog",array("blog_alias"=>$blog_alias,"blog_short_desc"=>$blog_short_desc,"meta_keyword"=>$meta_keyword,"meta_description"=>$meta_description,"blog_title"=>$blog_title,"blog_name"=>$blog_name,"blog_description"=>$blog_description,"blog_writer"=>$blog_writer));
	
	if($ad)
		{
		
			$img=$_FILES['blog_thumb_image']['name'];
			$ext=pathinfo($img,PATHINFO_EXTENSION);
			$pimage="blog_thumb_image".$ad.'.'.$ext;	
			
				if(move_uploaded_file($_FILES['blog_thumb_image']['tmp_name'],"../images/blog_thumb_image/".$pimage))
				{
					$link->where('blog_id',$ad);
					$a1=$link->update("blog",array("blog_thumb_image"=>$pimage));
					
					if($a1)
					{
						$img2=$_FILES['blog_big_image']['name'];
						$ext2=pathinfo($img2,PATHINFO_EXTENSION);
						$pimage2="blog_big_image".$ad.'.'.$ext2;	
						
							if(move_uploaded_file($_FILES['blog_big_image']['tmp_name'],"../images/blog_big_image/".$pimage2))
							{
								$link->where('blog_id',$ad);
								$a2=$link->update("blog",array("blog_big_image"=>$pimage2));
								
								if($a2)
								{
									header("location:view_blogs.php");
								}
							}
						
						//header("location:view_blogs.php");
							
					}
				}
			
		}
	
?>
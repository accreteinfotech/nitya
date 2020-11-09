<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$category_name=$_POST['category_name'];
	$category_id=$_POST['category_id'];
	$category_alias= str_replace(' ', '-',$_POST['category_alias']);
	$parent_category_id=$_POST['parent_category_id'];
	$category_title = $_POST['category_title'];
	$category_meta_title = $_POST['category_meta_title'];
	$category_meta_description = $_POST['category_meta_description'];
	$category_keywords= $_POST['category_keywords'];
	$category_og_title = $_POST['category_og_title'];
	$category_og_description = $_POST['category_og_description'];
	$category_og_url = $_POST['category_og_url'];
	
			$link->where('category_id',$category_id);
			$c=$link->update('category',array("category_alias"=>$category_alias,"category_name"=>$category_name,"parent_category_id"=>$parent_category_id,"category_title"=>$category_title,"category_meta_title"=>$category_meta_title,"category_meta_description"=>$category_meta_description,"category_keywords"=>$category_keywords,"category_og_title"=>$category_og_title,"category_og_description"=>$category_og_description,"category_og_url"=>$category_og_url));
			
			$img=$_FILES['category_icon']['name'];
		$ext=pathinfo($img,PATHINFO_EXTENSION);
		 $pimage="category_icon".$category_id.'.'.$ext;	
		
		
			if(move_uploaded_file($_FILES['category_icon']['tmp_name'],"../images/category_icon/".$pimage))
			{
				unlink('pimage');
				$link->where('category_id',$category_id);
				$a1=$link->update("category",array("category_icon"=>$pimage));
				if($a1)
				{
					header('location:View-Category');
				}
				
			}
					
			$img2=$_FILES['category_image']['name'];
			$ext2=pathinfo($img2,PATHINFO_EXTENSION);
			$idimage="category_image".$category_id.'.'.$ext2;	
			
			if(move_uploaded_file($_FILES['category_image']['tmp_name'],"../images/category_image/".$idimage))
			{
				unlink('idimage');
				$link->where('category_id',$category_id);
				$v=$link->update("category",array("category_image"=>$idimage));
				
				if($v)
				{
					header('location:View-Category');
				}
			}
			header('location:View-Category');
?>
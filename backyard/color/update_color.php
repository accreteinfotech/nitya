<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	//$color_title=$_POST['color_title'];
	$color_name=$_POST['color_name'];
	$color_code=$_POST['color_code'];
	//$color_alias= str_replace(' ', '-',$_POST['color_alias']);
	$color_id=$_POST['color_id'];
	//$color_writer=$_POST['color_writer'];
	//$meta_title=$_POST['meta_title'];
	//$meta_description=$_POST['meta_description'];
	//$meta_keyword=$_POST['meta_keyword'];
	//$color_short_desc=$_POST['color_short_desc'];
	
			$link->where('color_id',$color_id);
			$c=$link->update('color',array("color_name"=>$color_name,"color_code"=>$color_code));
			if($c){
			header('location:view_color.php');
		}
		else{
			echo "Error";
		}
			
		/*$img=$_FILES['color_thumb_image']['name'];
		$img2=$_FILES['color_big_image']['name'];
		if($img != null)
		{
			$check=$link->rawQueryone("select * from color where color_id=?",array($color_id));
			if($link->count > 0)
			{
				unlink("../images/color_thumb_image/".$check['color_thumb_image']);
				 $ext=pathinfo($img,PATHINFO_EXTENSION);
				 $pimage="color_thumb_image".$color_id.'.'.$ext;	
				
				if(move_uploaded_file($_FILES['color_thumb_image']['tmp_name'],"../images/color_thumb_image/".$pimage))
					{
						$link->where('color_id',$color_id);
						$a1=$link->update("color",array("color_thumb_image"=>$pimage));
						if($a1)
						{
							header('location:view_color.php');
						}
						
					}
			}
		}
		if($img2 != null)
		{
			$check2=$link->rawQueryone("select * from color where color_id=?",array($color_id));
			if($link->count > 0)
			{
				unlink("../images/color_big_image/".$check2['color_big_image']);
				 $ext2=pathinfo($img2,PATHINFO_EXTENSION);
				 $pimage2="color_big_image".$color_id.'.'.$ext2;	
				
				if(move_uploaded_file($_FILES['color_big_image']['tmp_name'],"../images/color_big_image/".$pimage2))
					{
						$link->where('color_id',$color_id);
						$a1=$link->update("color",array("color_big_image"=>$pimage2));
						if($a1)
						{
							header('location:view_color.php');
						}
						
					}
			}
		}
		else
		{
			header('location:view_color.php');
		}*/
?>
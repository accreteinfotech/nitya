<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	
	$color_name=$_POST['color_name'];
	$color_code=$_POST['color_code'];
	//$color_alias= str_replace(' ', '-',$_POST['color_alias']);
	//$color_name=$_POST['color_name'];
	//$color_description=$_POST['color_description'];
	//$meta_title=$_POST['meta_title'];
	//$meta_description=$_POST['meta_description'];
	//$meta_keyword=$_POST['meta_keyword'];
	//$color_short_desc=$_POST['color_short_desc'];
	
	$ad=$link->insert("color",array("color_name"=>$color_name,"color_code"=>$color_code));
	
	if($ad)
		
		{
			header("location:view_color.php");
							
		}
				
	
?>
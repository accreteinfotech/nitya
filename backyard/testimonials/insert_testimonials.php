<?php
	ob_start();
?>
<?php
include "../include/connect.php";

	
	$review_name=$_POST['review_name'];
	$review_location=$_POST['review_location'];
	$review_description=$_POST['review_description'];
	
	$ad=$link->insert("review",array("review_name"=>$review_name,"review_location"=>$review_location,"review_description"=>$review_description));
	
	if($ad)
		{
			$img2=$_FILES['review_image']['name'];
			$ext2=pathinfo($img2,PATHINFO_EXTENSION);
			$pimage2="review_image".$ad.'.'.$ext2;	
			if(move_uploaded_file($_FILES['review_image']['tmp_name'],"../images/review_image/".$pimage2))
			{
				$link->where('review_id',$ad);
				$a2=$link->update("review",array("review_image"=>$pimage2));
				
				if($a2)
				{
					header("location:View-Testimonials");
				}
			}
			
			
		}
?>
<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$review_name=$_POST['review_name'];
	$review_description=$_POST['review_description'];
	$review_id=$_POST['review_id'];
	$review_location=$_POST['review_location'];
	//$product_video_link=$_POST['product_video_link'];
	
			$link->where('review_id',$review_id);
			$c=$link->update('review',array("review_description"=>$review_description,"review_name"=>$review_name,"review_location"=>$review_location));
			
			$img2=$_FILES['review_image']['name'];
			$ext2=pathinfo($img2,PATHINFO_EXTENSION);
			$idimage="review_image".$review_id.'.'.$ext2;	
			
			if(move_uploaded_file($_FILES['review_image']['tmp_name'],"../images/review_image/".$idimage))
			{
				$link->where('review_id',$review_id);
				$v=$link->update("review",array("review_image"=>$idimage));
				
				if($v)
				{
					header('location:View-Testimonials');
				}
			}
			
			header('location:View-Testimonials');
			
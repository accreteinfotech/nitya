<?php
	ob_start();
?>
<?php
		include '../include/connect.php';
		
		$id=$_REQUEST['cid'];
		$link->where('product_id',$id);
		$a=$link->update("product",array("product_delete"=>1));
		if($a)
		{
		    $color_check=$link->rawQuery("select * from product_color where product_id=?",array($id));
		    if($link->count > 0)
		    {
    		    $link->where('product_id',$id);
        		$color=$link->delete("product_color");
        		
		    }
		    $size_check=$link->rawQuery("select * from product_size where product_id=?",array($id));
		    if($link->count > 0)
		    {
        		$link->where('product_id',$id);
        		$size=$link->delete("product_size");
        		
		    }
		    $gallery_check=$link->rawQuery("select * from product_gallery where product_id=?",array($id));
		    if($link->count > 0)
		    {
		        foreach($gallery_check as $gc)
		        {
		            unlink("../images/product_gallery_thumb_image/".$gc['product_gallery_thumb_image']);
		            unlink("../images/product_gallery_large_image/".$gc['product_gallery_large_image']);
		            $link->where('product_gallery_id',$gc['product_gallery_id']);
            		$gallery=$link->delete("product_gallery");
            	}
		    }
			header("location:../View-Product");
		}
		
?>
<?php
	include '../include/connect.php';
	
	$product_id=$_REQUEST['product_id'];
	$check=$link->rawQuery("select * from product_color pc,color c where pc.color_id=c.color_id and pc.product_id=?",array($product_id));
	if($link->count > 0)
	{
		?>
		<div class="form-group">
			<label>Color Name</label>
			<select class="form-control" name="color_id" id="color_id">
				<?php
				foreach($check as $color)
				{
					?>
					<option value="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></option>
					<?php
				}
				?>
			</select>
		</div>
			<?php
	}
	else
	{
		$check2=$link->rawQuery("select * from product p,color c where p.color_id=c.color_id and p.product_id=?",array($product_id));
		?>
		<div class="form-group">
			<label>Color Name</label>
			<select class="form-control" name="color_id" id="color_id">
				<?php
				foreach($check2 as $color)
				{
					?>
					<option value="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></option>
					<?php
				}
				?>
			</select>
		</div>
			<?php
	}
?>
<?php
	include '../include/connect.php';
	session_start();
	
	$sql=$link->rawQuery("select * from product where is_active1=1 and product_delete=0");
	if($link->count > 0)
	{
		foreach($sql as $pro)
		{
			if($pro['product_total_qty']>$danger && $pro['product_total_qty']<=$warning)
			{
				?>
					<div class="col-12 col-sm-12 col-md-12 col-xl-12">
						<div id="myToast" class="alert alert-warning alert-dismissible">
						<span  class="pull-right clickable" data-effect="slideUp"><i class="fa fa-times"></i></span>
							<strong>Warning!</strong> Your Product <a style="color:#856404;" href="../product/Edit-Product/<?php echo $pro['product_id']; ?>"><strong><?php echo $pro['product_name'] ?></strong></a> Have Less Then <?php echo $warning; ?> Inventory.
						</div>
					</div>
					<script src="../js/jquery.min.js"></script>
					<script>
				// A $( document ).ready() block.
				$('.clickable').on('click',function(){
					var effect = $(this).data('effect');
						$(this).closest('#myToast')[effect]();
					})
				
				</script>
				<?php
			}
			else if($pro['product_total_qty']<=$danger)
			{
				?>
				
					<div class="col-12 col-sm-12 col-md-12 col-xl-12">
						<div id="myToast" onclick="close();" class="alert alert-danger alert-dismissible">
						<span class="pull-right clickable" data-effect="slideUp"><i class="fa fa-times"></i></span>
							<strong>Warning!</strong> Your Product <a style="color:#721c24;" href="../product/Edit-Product/<?php echo $pro['product_id']; ?>"><strong><?php echo $pro['product_name'] ?></strong></a> Have Less Then <?php echo $danger; ?> Inventory.
						</div>
					</div>
				<?php
			}
		}
	}
?>
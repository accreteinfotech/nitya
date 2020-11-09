<!doctype html>
<html lang="en">

<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header("location:../index.php");
	}
	include '../include/connect.php';
?>
<head>
	<base href="<?php echo $site_url; ?>/backyard/order/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | View Order Details</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="../css/default-assets/datatables.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/responsive.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/buttons.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/select.bootstrap4.css">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="../style.css">
<script type="text/javascript">
function confirmationDelete(anchor)
{
   var conf = confirm('Are You Sure Want To Delete ?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
</head>

<body>
    <!-- Preloader -->
   
    <!-- Choose Layout -->
   
    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">
        <!-- Sidemenu Area -->
        <?php
			include '../include/side_menu.php';
		?>

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
            <?php
				include '../include/header.php';
			?>

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">View Order Details</h4>
								
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
														<th>Product</th>
														<th>Name</th>
														<th>SKU</th>
                                            			<th>Color</th>
                                            			<th>Size</th>
														<th>Qty</th>	
														<th>Rate</th>	 	 	 	
														<th>Total</th>	 
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
											$sql=$link->rawQuery("select op.*,oi.*,p.product_id,p.product_name,p.product_image,p.product_code,p.product_price,p.product_gst,p.product_shipping_charge,p.product_alias from order_product op,order_item oi,product p where op.order_product_id=oi.order_product_id and oi.product_id=p.product_id and op.order_product_id=?",array($_REQUEST['oid']));
											if($sql)
											{
												$gst_amount=0;
												$shipping_amount=0;
												$gst=0;
												foreach($sql as $cat)
												{
													?>
													<tr>
														<td><img style="height: 50px;width: 50px;"  src="../images/product_image/<?php echo $cat['product_image']; ?>"></td>
														<td><?php echo $cat['product_name']; ?></td>
														<td><?php echo $cat['product_code']; ?></td>
														<?php
                                						    $color=$link->rawQueryOne("select * from color where color_id=?",array($cat['color_id']));
                                						    $size=$link->rawQueryOne("select * from inventory where inventory_id=?",array($cat['inventory_id']));
                                						?>
                                						<td><?php echo $color['color_name']; ?></td>
                                						<td><?php echo $size['inventory_type']; ?></td>
														<td><?php echo $cat['qty']; ?></td>
														<?php
															if($cat['price']!=0)
															{
																?>
																<td>&#8377 <?php echo sprintf("%.2f", $cat['price']); ?></td>
																<td>&#8377 <?php echo sprintf("%.2f", $product_total=$cat['price']*$cat['qty']); ?></td>
																<?php
																$shipping_amount=$shipping_amount+$cat['product_shipping_charge']*$cat['qty'];
																$gst=$product_total*$cat['product_gst']/100;
																$gst_amount=$gst_amount+$gst;
															}
															else
															{
																?>
																<td>GET QUOTE</td>
																<td>GET QUOTE</td>
																<?php
															}
															?>
													</tr>
													<?php
												}
												if($cat['order_total']!=0)
												{
												?>
													<tr>
														<td colspan="7">Shipping Charge</td>
														<td>&#8377 <?php echo sprintf("%.2f",$shipping_amount); ?></td>
													</tr>
													<tr>
														<td colspan="7">Total</td>
														<td>&#8377 <?php echo sprintf("%.2f",$cat['order_total']); ?></td>
													</tr>
													<?php
												}
											}
										?>
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                   
                </div>

                <!-- Footer Area -->
           <?php
			include '../include/footer.php';
		   ?>
            </div>
        </div>
    </div>


    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>

    <!-- Active JS -->
    <script src="../js/default-assets/fullscreen.js"></script>
    <script src="../js/default-assets/active.js"></script>

    <!-- These plugins only need for the run this page -->
    <script src="../js/default-assets/jquery.datatables.min.js"></script>
    <script src="../js/default-assets/datatables.bootstrap4.js"></script>
    <script src="../js/default-assets/datatable-responsive.min.js"></script>
    <script src="../js/default-assets/responsive.bootstrap4.min.js"></script>
    <script src="../js/default-assets/datatable-button.min.js"></script>
    <script src="../js/default-assets/button.bootstrap4.min.js"></script>
    <script src="../js/default-assets/button.html5.min.js"></script>
    <script src="../js/default-assets/button.flash.min.js"></script>
    <script src="../js/default-assets/button.print.min.js"></script>
    <script src="../js/default-assets/datatables.keytable.min.js"></script>
    <script src="../js/default-assets/datatables.select.min.js"></script>
    <script src="../js/default-assets/demo.datatable-init.js"></script>
    <script src="../js/default-assets/dashboard-chat.js"></script>

</body>

</html>
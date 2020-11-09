<?php
    ob_start();
?>
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
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | View Order</title>

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
                                    <h4 class="card-title mb-2">View Order</h4>
								    <div class="table-responsive">
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
												<th>Order Status</th>
												<th>Show</th>
												<!--<th>Invoice</th>-->
                                                <th>Full Name</th>
                                                <th>Company Name</th>
                                                <th>Date</th>
												<th>Payment Type</th>
												<th>Total</th>
												<th>E-Mail</th>
												<th>Phone</th>
												<th>Add. Line 1</th>
                                                <th>Add. Line 2</th>
                                                <th>Pincode</th>
												<th>City</th>
												<th>State</th>
												<th>Country</th>
												<th>Note</th>
                                               
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
											$sql=$link->rawQuery("select * from order_product op,status s where s.status_id=op.status_id and op.is_active='1' group by op.order_product_id");
											if($sql)
											{
												foreach($sql as $cat)
												{
													?>
													<tr>
													    <td><?php echo $cat['order_product_id']; ?></td>
													<?php
														if($cat['status_id']==1)
														{
															$flag=1;
															?>
																<td><a href="packing.php?pid=<?php echo $cat['order_product_id'];?>" class="btn btn-neutral" style="background-color:#FF0000;color:#ffffff;"><?php echo $cat['status_name'];?></a></td>
																
														<?php
														}
														else if($cat['status_id']==2)
														{
															?>
																<td><a href="shipping.php?pid=<?php echo $cat['order_product_id'];?>" class="btn btn-neutral" style="background-color:#ff7600;color:#ffffff;"><?php echo $cat['status_name'];?></a></td>
															<?php
														}
														else if($cat['status_id']==3)
														{
															?>
																<td><a href="active.php?pid=<?php echo $cat['order_product_id'];?>" class="btn btn-neutral" style="background-color:#005aff;color:#ffffff;"><?php echo $cat['status_name'];?></a></td>
															<?php
														}
														else
														{
																?>
																<td><span class="btn btn-neutral" style="background-color:#00b200;color:#ffffff;"><?php echo "Completed";?></span></td>
																<?php
														}
													?>
														<td><a href="Show-Order-Detail/<?php echo $cat['order_product_id']; ?>"><img style="height: 30px;width: 30px;"  src="../img/eye.png"></a></td>
														<!--<td><a href="Invoice/<?php //echo $cat['order_product_id']; ?>"><img style="height: 30px;width: 30px;"  src="../img/pdf.png"></a></td>-->
														<td><?php echo $cat['full_name']; ?></td>
														<td><?php echo $cat['order_company']; ?></td>
														<td><?php echo date('d M, Y',strtotime($cat['order_date_time'])); ?></td>
														<td><?php echo $cat['order_product_type']; ?></td>
														<?php
															if($cat['order_total']!=0)
															{
																?>
																<td>&#8377 <?php echo sprintf("%.2f", $cat['order_total']); ?></td>
																<?php
															}
															else
															{
																?>
																<td>GET QUOTE</td>
																<?php
															}
														?>
														<td><?php echo $cat['order_mail']; ?></td>
														<td><?php echo $cat['order_phone']; ?></td>
														<td><?php echo $cat['order_add1']; ?></td>
														<td><?php echo $cat['order_add2']; ?></td>
														<td><?php echo $cat['order_pincode']; ?></td>
														<?php
															$city=$link->rawQueryOne("select * from cities where id=?",array($cat['order_city']));
														?>
														<td><?php echo $city['city']; ?></td>
														<?php
															$state=$link->rawQueryOne("select * from states where id=?",array($cat['order_state']));
														?>
														<td><?php echo $state['name']; ?></td>
														<?php
															$country=$link->rawQueryOne("select * from countries where id=?",array($cat['order_country']));
														?>
														<td><?php echo $country['name']; ?></td>
														
														<td><?php echo $cat['order_comments']; ?></td>
														<!--<td><a onClick='javascript:confirmationDelete($(this));return false;' href="delete_contact.php?cid=<?php echo $cat['contact_id'];?>"></a></td>-->
														
													</tr>
													<?php
												}
											}
										?>
                                        </tbody>
                                    </table>
                                    </div>
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
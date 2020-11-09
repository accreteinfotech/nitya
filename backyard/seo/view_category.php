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
	<base href="<?php echo $site_url; ?>backyard/seo/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | View Product Category</title>

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
                                    <h4 class="card-title mb-2">View Category List</h4>
									<div class="table-responsive"> 
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
												<th>Category Name</th>
												<th>Category Alias</th>
												<th>Parent Category</th>
												<th>Category Icon</th>
												<th>Edit</th>
												
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
											$sql=$link->rawQuery("select * from category where category_delete=0");
											if($sql)
											{
												foreach($sql as $cat)
												{
													?>
													<tr>
														<td><?php echo $cat['category_name']; ?></td>
														<td><?php echo $cat['category_alias']; ?></td>
														<td>
														<?php
														if($cat['parent_category_id']==0)
														{
															echo "None";
														}
														else
														{
															$parent=$link->rawQueryOne("select * from category where category_id=?",array($cat['parent_category_id']));
															echo $parent['category_name'];
														}
														?>
														</td>
                                                        <td><img style="height:100px;width:100px;" src="../images/category_icon/<?php echo $cat['category_icon']; ?>"></td>
														<td><a href="Edit-Category/<?php echo $cat['category_id']; ?>"><img style="height: 30px;width: 30px;"  src="../img/edit.png"></a></td>
														
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
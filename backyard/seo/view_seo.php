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
    <title><?php echo $project_name; ?> | View Page SEO</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="../css/default-assets/datatables.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/responsive.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/buttons.bootstrap4.css">
    <link rel="stylesheet" href="../css/default-assets/select.bootstrap4.css">

	 <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
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
	<style>
	 .card-header {
            padding: 0.2rem 1.25rem;
            /* margin-bottom: 0; */
            background-color: #ffffff;
            border-bottom: 0px;
        }
        
        .card-body {
            padding: 0rem 1.25rem;
        }
        
        p {
            margin-top: 0;
            margin-bottom: 10px;
        }
        
        .card {
            border-radius: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        .flex-wrap {
            margin-bottom: -35px;
        }
        
        div.dataTables_wrapper div.dataTables_paginate {
            margin-top: -25px;
        }
       
	</style>
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
                                    <h4 class="card-title mb-2">View Page List</h4>
									<div class="table-responsive"> 
									 <table class="table table-bordered table-hover" id="table_id">
										<thead>
											<tr>
												<th>Page Name</th>
												<th>Title</th>
												<th>Description</th>
												<th>Keywords</th>
												<th>Author</th>
												<th>OG Title</th>
												<th>OG Description</th>
												<th>OG URL</th>
												 <th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$sql=$link->rawQuery("select * from page_seo");
											if($sql)
											{
												foreach($sql as $cat)
												{
													?>
													<tr>
														<td><?php echo $cat['page_seo_name']; ?></td>
														<td><?php echo $cat['page_seo_title']; ?></td>
														<td><?php echo $cat['page_seo_description']; ?></td>
														<td><?php echo $cat['page_seo_keywords']; ?></td>
														<td><?php echo $cat['page_seo_author']; ?></td>
														<td><?php echo $cat['page_seo_og_title']; ?></td>
														<td><?php echo $cat['page_seo_og_description']; ?></td>
														<td><?php echo $cat['page_seo_og_url']; ?></td>
														
													<td><a href="Edit-Seo/<?php echo $cat['page_seo_id']; ?>"><img style="height: 30px;width: 30px;"  src="../img/edit.png"></a></td>
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
	<script>
	$(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
	</script>
</body>

</html>
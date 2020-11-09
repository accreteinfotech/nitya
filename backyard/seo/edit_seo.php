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
    <title><?php echo $project_name; ?> | Edit Page SEO</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="../css/default-assets/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="../css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../css/default-assets/color-picker-bootstrap.css">
    <link rel="stylesheet" href="../css/default-assets/daterange-picker.css">
    <link rel="stylesheet" href="../css/default-assets/form-picker.css">
    <link rel="stylesheet" href="../css/default-assets/select2.min.css">


    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="../style.css">
	
</head>

<body>
    <!-- Preloader -->
    <div id="preloader"></div>

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
                <!-- Basic Form area Start -->
                <div class="container-fluid">
                    <!-- Form row -->
                    <div class="row">
                       <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Page SEO</h4>
                                   <?php
										
										$ad=$link->rawQueryOne("select * from page_seo where page_seo_id=?",array($_REQUEST['cid']));
										if($link->count > 0)
										{
												$page_seo_title=$ad['page_seo_title'];
												$page_seo_id=$ad['page_seo_id'];
												$page_seo_description=$ad['page_seo_description'];
												$page_seo_keywords=$ad['page_seo_keywords'];
												$page_seo_author=$ad['page_seo_author'];
												$page_seo_og_title=$ad['page_seo_og_title'];
												$page_seo_og_description=$ad['page_seo_og_description'];
												$page_seo_og_url=$ad['page_seo_og_url'];
										}
									?>
                                    <form action="Update-Seo" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                            <label for="exampleInputName1"> Select Page</label>
                                            <select name="page_seo_id" id="page_seo_id" class="form-control">
												<?php
													$sql=$link->rawQuery("select * from page_seo");
													if($link->count > 0)
													{
														foreach($sql as $cat)
														{
															?>
																<option value="<?php echo $cat['page_seo_id']; ?>" <?php if($cat['page_seo_id']==$page_seo_id){ echo "selected"; } ?>><?php echo $cat['page_seo_name']; ?></option>
															<?php
														}
													}
												?>
											</select>
									    </div>
										 <div class="form-group">
                                            <label for="exampleInputName1">Meta Title</label>
                                            <input type="text" class="form-control" value="<?php echo $page_seo_title; ?>" id="page_seo_title" name="page_seo_title" placeholder="Title">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Description</label>
                                            <textarea class="form-control" id="page_seo_description" name="page_seo_description" placeholder="Description"><?php echo $page_seo_description; ?></textarea>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Keywords</label>
                                            <textarea class="form-control" id="page_seo_keywords" name="page_seo_keywords" placeholder="Keywords"><?php echo $page_seo_keywords; ?></textarea>
										</div>
										 <div class="form-group">
                                            <label for="exampleInputName1">Meta Author</label>
                                            <input type="text" class="form-control" value="<?php echo $page_seo_author; ?>" id="page_seo_author" name="page_seo_author" placeholder="Author">
										</div>
										<h5 class="card-title">Meta Og Tag</h5>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Og Title</label>
                                            <input type="text" class="form-control" value="<?php echo $page_seo_og_title; ?>" id="page_seo_og_title" name="page_seo_og_title" placeholder="Title">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Og Description</label>
                                            <textarea class="form-control" id="page_seo_og_description" name="page_seo_og_description" placeholder="Description"><?php echo $page_seo_og_description; ?></textarea>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Og URL</label>
                                            <input type="text" class="form-control" value="<?php echo $page_seo_og_url; ?>" id="page_seo_og_url" name="page_seo_og_url" placeholder="URL">
										</div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button type="reset" class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
	<script>
	//Form Validation
		$( document ).ready( function () {
			$( "#formsubmit" ).validate( {
				rules: {
					fullname: 
					{
						required: true,
						minlength: 2,
					},
					category_name: "required",
					category_icon: "required",
					category_image: "required",
					phoneno: {
						required: true,
						 digits: true,
						 minlength: 10,
						maxlength: 10
					},
					username: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					fullname: 
					{
						required: "Please enter your fullname",
						minlength: "Please enter alteast 2 charactor",
					},
					category_name: "Please enter category name",
					category_icon: "Please select category icon",
					category_image: "Please select category image",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					phoneno: {
						required: "Please enter a Phone",
						digits: "Enter Only Dighits",
						minlength: "Enter Only 10 Dighits",
						maxlength: "Enter Only 10 Dighits",
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );

		} );
	</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>
	
    <!-- Active JS -->
    <script src="../js/default-assets/fullscreen.js"></script>
    <script src="../js/default-assets/active.js"></script>

    <!-- These plugins only need for the run this page -->
    <script src="../js/default-assets/file-upload.js"></script>
    <script src="../js/default-assets/basic-form.js"></script>
    <script src="../js/default-assets/jquery.bootstrap-touchspin.min.js"></script>
    <script src="../js/default-assets/jquery.bootstrap-touchspin.custom.js"></script>
    <script src="../js/bootstrap-colorpicker.min.js"></script>
    <script src="../js/default-assets/colorpicker-bootstrap.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/default-assets/daterange-picker.js"></script>
    <script src="../js/default-assets/form-picker.js"></script>
    <script src="../js/default-assets/select2.js"></script>
    <script src="../js/default-assets/dashboard-chat.js"></script>

</body>

</html>
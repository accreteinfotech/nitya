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
	<base href="<?php echo $site_url; ?>backyard/product_gallery/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Add Product Gallery</title>

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
	<style>
	.form-control.is-valid, .was-validated .form-control:valid {
    border-color: #28a745;
    padding-right: calc(1.5em + .75rem);
    background-image: url();
    background-repeat: no-repeat;
    background-position: center right calc(.375em + .1875rem);
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
.form-control.is-invalid, .was-validated .form-control:invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + .75rem);
    background-image: url();
    background-repeat: no-repeat;
    background-position: center right calc(.375em + .1875rem);
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
	</style>
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
                                    <h4 class="card-title">Add Product Gallery</h4>
                                   
                                    <form action="Insert-Product-Gallery" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                       
										<div class="form-group">
											<label>Product Name</label>
                                            <select onchange="getcolor(this.value);" class="form-control" name="product_id" id="product_id">
											<option value="">-- select product --</option>
												<?php
													$sql=$link->rawQuery("select * from product where is_active1=1 and product_delete=0 order by product_id desc");
													if($sql)
													{
														foreach($sql as $cat)
														{
															?>
															<option value="<?php echo $cat['product_id']; ?>"><?php echo $cat['product_name']; ?></option>
															<?php
														}
													}
												?>
											</select>
											<div><span id="s1" style="color:red;"></span></div>
                                        </div>
										<div class="form-group">
                                            <label>Product Images</label>
                                            <input required type="file" class="form-control" name="files[]" id="product_gallery_thumb_image" multiple >
											<div><span id="s2" style="color:red;"></span></div>
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
					product_id: 
					{
						required: true,
					},
					product_gallery_thumb_image: 
					{
						required: true,
					},
					product_gallery_large_image: "required",
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
					product_id: "Please select product name",
					product_gallery_thumb_image: "Please select thumb image",
					product_gallery_large_image: "Please select large image",
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
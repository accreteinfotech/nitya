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
	<base href="<?php echo $site_url; ?>backyard/category/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Add Product Category</title>

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
                                    <h4 class="card-title">Add Product Category</h4>
                                   
                                    <form action="Insert-Category" onsubmit="return myfunn1();" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Category Name</label>
                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
											<div><span id="s1" style="color:red;"></span></div>
									    </div>
										<div class="form-group">
                                            <label for="exampleInputName1">Category Alias</label>
                                            <input type="text" onkeyup="aliascheck(this.value);" class="form-control" id="category_alias" name="category_alias" placeholder="Category Alias">
											<span id="rerror" style="width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;"></span>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1"> Select Parent Category</label>
                                            <select name="parent_category_id" id="parent_category_id" class="form-control">
											<option value="0">None</option>
												<?php
													$sql=$link->rawQuery("select * from category where category_delete=0");
													if($link->count > 0)
													{
														foreach($sql as $cat)
														{
															?>
																<option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
															<?php
														}
													}
												?>
											</select>
									    </div>
										 <div class="form-group">
                                            <label>Category Icon </label>
                                            <input type="file" class="form-control" name="category_icon" id="category_icon">
											<div><span id="s2" style="color:red;"></span></div>
                                           </div>
                                       <div class="form-group">
                                            <label>Category Cover Image</label>
                                            <input type="file" class="form-control" name="category_image" id="category_image" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                         <div class="form-group">
                                            <label>Category Title</label>
                                            <input type="text" class="form-control" name="category_title" id="category_title" placeholder="Title" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Meta Ttitle</label>
                                            <input type="text" class="form-control" name="category_meta_title" id="category_meta_title" placeholder="Meta Title">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Meta Description</label>
                                            <input type="text" class="form-control" name="category_meta_description" id="category_meta_description" placeholder="Meta Description" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Keywords</label>
                                            <input type="text" class="form-control" name="category_keywords" id="category_keywords" placeholder="Keywords">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Og Title</label>
                                            <input type="text" class="form-control" name="category_og_title" id="category_og_title" placeholder="Og Title">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Og Description</label>
                                            <input type="text" class="form-control" name="category_og_description" id="category_og_description" placeholder="Og Description">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Og Url</label>
                                            <input type="text" class="form-control" name="category_og_url" id="category_og_url" placeholder="Og Url">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <button type="submit" id="reg" class="btn btn-primary mr-2">Submit</button>
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
	function aliascheck(val)
		{
			$.ajax({
			 type: "POST",
			   url: "alias_check.php",
			   data: "alias="+val,
					
					// serializes the form's elements.
			   success: function(data)
			   {
					if(data == 'already')
					{
						$("#rerror").html("Existing Alias");
						$("#reg").prop('disabled', true);
						//mailcheck.preventDefault();
						//swal("Good job!", "You clicked the button!", "warning");
					}
					else
					{
						$("#rerror").html("");
						$("#reg").prop('disabled', false);
					}
			   }
			});
			
		}
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
					category_alias: "required",
					category_icon: "required",
					category_image: "required",
					/*category_title: "required",
					category_meta_title: "required",
					category_meta_description: "required",
					category_keywords: "required",
					category_og_title: "required",
					category_og_description: "required",
					category_og_url: "required",*/
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
					category_alias: "Please enter category alias",
					category_icon: "Please select category icon",
					category_image: "Please select category image",
					/*category_title: "Please enter category title",
					category_meta_title: "Please enter category meta title",
					category_meta_description: "Please enter category meta description",
					category_keywords: "Please enter category keywords",
					category_og_title: "Please enter category og title",
					category_og_description: "Please enter category og description",
					category_og_url: "Please enter category og url",*/
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
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
    <title><?php echo $project_name; ?> | Edit Project Category</title>

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
	<script type="text/javascript">
function myfunn1()
{
	var s=true;
	document.getElementById("s1").innerHTML="";
	
	
	 var n1=document.f1.category_name.value;
	
		if(n1==0)
		{
			document.getElementById("s1").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Category *";
			s=false;
		}
	 return s; 
}
</script>

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
                                    <h4 class="card-title">Edit Product Category</h4>
                                   <?php
										
										$ad=$link->rawQueryOne("select * from category where category_id=?",array($_REQUEST['cid']));
										if($link->count > 0)
										{
												$category_id=$ad['category_id'];
												$category_title = $ad['category_title'];
												$category_meta_title = $ad['category_meta_title'];
												$category_meta_description = $ad['category_meta_description'];
												$category_keywords = $ad['category_keywords'];
												$category_og_title = $ad['category_og_title'];
												$category_og_description = $ad['category_og_description'];
												$category_og_url = $ad['category_og_url'];
										}
									?>
                                    <form action="Update-Category"  name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<input type="hidden" id="category_id" name="category_id" class="form-control" value="<?php echo $category_id;?>">
										</div>
									   <div class="form-group">
                                            <label>Category Title</label>
                                            <input type="text" class="form-control" name="category_title" id="category_title" placeholder="Title" value="<?php echo $category_title;?>" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Meta Ttitle</label>
                                            <input type="text" class="form-control" name="category_meta_title" id="category_meta_title" placeholder="Meta Title" value="<?php echo $category_meta_title;?>" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Meta Description</label>
                                            <input type="text" class="form-control" name="category_meta_description" id="category_meta_description" placeholder="Meta Description" value="<?php echo $category_meta_description;?>">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Keywords</label>
                                            <input type="text" class="form-control" name="category_keywords" id="category_keywords" placeholder="Keywords" value="<?php echo $category_keywords;?>" >
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category OG / Twitter Title</label>
                                            <input type="text" class="form-control" name="category_og_title" id="category_og_title" placeholder="Og Title" value="<?php echo $category_og_title;?>">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category OG / Twitter Description</label>
                                            <input type="text" class="form-control" name="category_og_description" id="category_og_description" placeholder="Og Description" value="<?php echo $category_og_description;?>">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category OG / Twitter Url</label>
                                            <input type="text" class="form-control" name="category_og_url" id="category_og_url" placeholder="Og Url" value="<?php echo $category_og_url;?>">
											<div><span id="s3" style="color:red;"></span></div>
                                        </div><button type="submit" id="reg" class="btn btn-primary mr-2">Submit</button>
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
	function aliascheck(val,val2)
		{
			$.ajax({
			 type: "POST",
			   url: "alias_check.php",
			   data: "edit_alias="+val+"&id="+val2,
					
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
	<script>
	
	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#imagePreview1').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#category_icon").change(function(){
		readURL(this);
	});
	   function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#imagePreview3').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#category_image").change(function(){
		readURL(this);
	});
	</script>
	<script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>

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
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
	<base href="<?php echo $site_url; ?>backyard/testimonials/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Add Testimonials</title>

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
	document.getElementById("s2").innerHTML="";
	document.getElementById("s4").innerHTML="";
	document.getElementById("s5").innerHTML="";
	
	 var n2=document.f1.review_name.value;
	 var n4=document.f1.review_location.value;
	 	
		if(n2==0)
		{
			document.getElementById("s2").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Testimonial Name *";
			s=false;
		}
	
		var n5=document.f1.ckeExample.value;
	
		if(jQuery("#cke_1_contents iframe").contents().find("body").text().length == 0)
		{
			document.getElementById("s5").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Testimonial Description *";
			s=false;
		}
		if(n4==0)
		{
			document.getElementById("s4").innerHTML="  <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Testimonial Place *";
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
                                    <h4 class="card-title">Add Testimonial</h4>
                                   
                                    <form action="Insert-Testimonials" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Testimonial Name</label>
                                            <input type="text" class="form-control" id="review_name" name="review_name" placeholder="Testimonial Name">
											<div><span id="s2" style="color:red;"></span></div>
									    </div>
										<div class="form-group">
                                            <label for="exampleInputName1">Testimonial Designation</label>
                                            <input type="text" class="form-control" id="review_location" name="review_location" placeholder="Testimonial Designation">
											<div><span id="s4" style="color:red;"></span></div>
									    </div>
										<div class="form-group">
                                            <label>Testimonial Description</label>
                                            <textarea required cols="80" class="ckeditor" rows="10" id="ckeExample" name="review_description"></textarea>
											<div><span id="s5" style="color:red;"></span></div>
                                        </div>
										 <div class="form-group">
                                            <label>Testimonial Image</label>
                                            <input type="file" class="form-control" name="review_image" id="review_image" >
											<div><span id="s3" style="color:red;"></span></div>
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
					review_name: "required",
					review_location: "required",
					review_image: "required",
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
					review_name: "Please enter testimonial name",
					review_location: "Please enter testimonial designation",
					review_image: "Please select testimonial image",
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
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
	<script>
	var ckEditorID;

	ckEditorID = 'ckeExample';

	CKEDITOR.config.forcePasteAsPlainText = true;
	CKEDITOR.replace( ckEditorID,
		{
			toolbar :
			[
			 { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
			{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
			{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
			{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
			'/',
			{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
			{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
			{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
			{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
			'/',
			{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
			{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
			{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
			{ name: 'about', items: [ 'About' ] }
			]
		  
		})
	</script>

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
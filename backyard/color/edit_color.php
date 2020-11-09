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
	<base href="<?php echo $site_url; ?>/backyard/color/">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Edit color</title>

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
{var s=true;
	document.getElementById("s1").innerHTML="";
	document.getElementById("s2").innerHTML="";
	document.getElementById("s5").innerHTML="";
	document.getElementById("s11").innerHTML="";
	
	 //var n1=document.f1.color_title.value;
	 var n2=document.f1.color_name.value;
	 var n11=document.f1.color_code.value;
		if(n1==0)
		{
			document.getElementById("s1").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter color Title *";
			s=false;
		}
		if(n11==0)
		{
			document.getElementById("s11").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Select color Category *";
			s=false;
		}
		if(n2==0)
		{
			document.getElementById("s2").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter color Name *";
			s=false;
		}
	
		var n5=document.f1.ckeExample.value;
	
		if(jQuery("#cke_1_contents iframe").contents().find("body").text().length == 0)
		{
			document.getElementById("s5").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter color Description *";
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
                                    <h4 class="card-title">Edit color</h4>
                                   <?php
										
										$ad=$link->rawQueryOne("select * from color where color_id=?",array($_REQUEST['cid']));
										if($link->count > 0)
										{
											
												//$color_title=$ad['color_title'];
												$color_name=$ad['color_name'];
												$color_code=$ad['color_code'];
												//$color_description=$ad['color_description'];
												//$color_thumb_image=$ad['color_thumb_image'];
												//$color_big_image=$ad['color_big_image'];
												$color_id=$ad['color_id'];
												//$color_writer=$ad['color_writer'];
												//$meta_title=$ad['meta_title'];
												//$meta_description=$ad['meta_description'];
												//$meta_keyword=$ad['meta_keyword'];
												//$color_short_desc=$ad['color_short_desc'];
												
										}
									?>
                                    <form action="update_color.php" onsubmit="return myfunn1();" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
											<input type="hidden" id="color_id" name="color_id" class="form-control" value="<?php echo $color_id;?>">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">color Name</label>
                                            <input type="text" class="form-control" id="color_name" name="color_name" placeholder="Name" value="<?php echo $color_name;?>" onblur="getData(this.value);">
											<div><span id="s1" style="color:red;"></span></div>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">color Code</label>
                                            <input type="text" class="form-control" id="color_code" name="color_code" placeholder="Code" value="<?php echo $color_code;?>" >
											<div><span id="s2" style="color:red;"></span></div>
										</div>
										<!--<div class="form-group">
                                            <label for="exampleInputName1">color Alias</label>
                                            <input type="text" onkeyup="aliascheck(this.value);" class="form-control" id="color_alias" name="color_alias" value="<?php //echo $color_alias;?>" placeholder="color Alias">
											<span id="rerror" style="width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;"></span>
										</div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputName1">color Short Desc</label>
                                            <input type="text" class="form-control" id="color_short_desc" value="<?php //echo $color_short_desc; ?>" name="color_short_desc" placeholder="color Short Desc">
									    </div>
									    <div class="form-group">
                                            <label>color Description</label>
                                            <textarea cols="80" rows="10" id="ckeExample" name="color_description" required><?php //echo $color_description;?></textarea>
											<div><span id="s5" style="color:red;"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">color Meta Title</label>
                                            <input type="text" class="form-control" id="meta_title" value="<?php //echo $meta_title;?>" name="meta_title" placeholder="color Meta Title">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">color Meta Description</label>
                                            <input type="text" class="form-control" id="meta_description" value="<?php// echo $meta_description;?>" name="meta_description" placeholder="color Meta Description">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">color Meta Keywords</label>
                                            <input type="text" class="form-control" id="meta_keyword" value="<?php// echo $meta_keyword;?>" name="meta_keyword" placeholder="color Meta Keywords">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">color Writer Name (optional)</label>
                                            <input type="text" class="form-control" id="color_writer" name="color_writer" placeholder="color Writer Name" value="<?php// echo $color_writer; ?>">
											<div><span id="s22" style="color:red;"></span></div>
									    </div>
                                       <div class="form-group">
                                            <label>color Thumb Image ( size: 370 X 200 px )</label>
                                            <input type="file" class="form-control" name="color_thumb_image" id="color_thumb_image"  onchange="readURL1(this);">
                                        </div>
										  <div class="col-sm-12" style="padding:10px;">
											<img id="imagePreview1" style="height:180px;width:250px;border-style:dotted;"  src="../images/color_thumb_image/<?php //echo $color_thumb_image;?>" height="260px"> 
											</div>
										<div class="form-group">
                                            <label>color Large Image ( size: 1200 X 628 px )</label>
                                            <input type="file" class="form-control" name="color_big_image" id="color_big_image"  onchange="readURL2(this);">
                                        </div>
										  <div class="col-sm-12" style="padding:10px;">
											<img id="imagePreview2" style="height:180px;width:250px;border-style:dotted;"  src="../images/color_big_image/<?php //echo $color_big_image;?>" height="260px"> 
											</div>-->
                                        <input type="submit" id="reg" class="btn btn-primary mr-2" value="submit">
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
	/*function aliascheck(val)
		{
			$.ajax({
			 type: "POST",
			   url: "alias_check.php",
			   data: "edit_alias="+val,
					
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
			
		}*/
	//Form Validation
		$( document ).ready( function () {
			$( "#formsubmit" ).validate( {
				rules: {
					/*fullname: 
					{
						required: true,
						minlength: 2,
					},*/
					color_name: "required",
					color_code: "required",
					color_small_desacription: "required",
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
					color_name: "Please enter color name",
					color_code: "Please enter color code",
					color_small_desacription: "Please enter color small description",
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

$("#color_thumb_image").change(function(){
    readURL1(this);
});
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagePreview2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#color_big_image").change(function(){
    readURL2(this);
});
</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
	  

<script>
 CKEDITOR.replace( 'ckeExample', {
    filebrowserUploadUrl: "../../include/upload2.php" 
} );
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
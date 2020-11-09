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
	<base href="<?php echo $site_url; ?>backyard/product/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Edit Product</title>

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
		/*var s=true;
		document.getElementById("s1").innerHTML="";
		document.getElementById("s3").innerHTML="";
		document.getElementById("s5").innerHTML="";
		document.getElementById("s6").innerHTML="";
		
		
		
		 var n1=document.f1.category_id.value;
		 var n3=document.f1.product_name.value;
		 var n5=document.f1.product_price.value;
		 
			if(n1==0)
			{
				document.getElementById("s1").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Category First *";
				s=false;
			}
			if(n3==0)
			{
				document.getElementById("s3").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Product Name *";
				s=false;
			}
			
			if(n5==0)
			{
				document.getElementById("s5").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Product Price *";
				s=false;
			}
			var n6=document.f1.ckeExample.value;
		
			if(jQuery("#cke_1_contents iframe").contents().find("body").text().length == 0)
			{
				document.getElementById("s6").innerHTML=" <i class='fa fa-exclamation-triangle' style='margin-top:10px'> </i> Please Enter Full Description *";
				s=false;
			}
	
			
		 return s; */
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
                                    <h4 class="card-title">Edit Product</h4>
                                   <?php
										
										$ad=$link->rawQueryOne("select * from product where product_id=?",array($_REQUEST['cid']));
										if($link->count > 0)
										{
												$product_id=$ad['product_id'];
										}
									?>
                                    <form action="Update-Product" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
											<input type="hidden" id="product_id" name="product_id" class="form-control" value="<?php echo $product_id;?>">
										</div>
										
									
										<div class="form-group">
                                            <label for="exampleInputName1">Product Name</label>
											<input type="text" value="<?php echo $ad['product_name']; ?>" name="product_name" placeholder="Enter Name" class="form-control" id="product_name">
											<div>
											<span id="s3" style="color:red;"></span></div>
									    </div>
										<div class="form-group">
                                            <label for="exampleInputName1">Product Alias</label>
                                            <input type="text" onkeyup="aliascheck(this.value,<?php echo $product_id; ?>);" class="form-control" id="product_alias" name="product_alias" value="<?php echo $ad['product_alias'];?>" placeholder="Product Alias">
											<span id="rerror" style="width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;"></span>
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Product Code</label>
											<input type="text" value="<?php echo $ad['product_code']; ?>" name="product_code" placeholder="Enter Code" class="form-control" id="product_code">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Product Total Qty</label>
											<input type="text" value="<?php echo $ad['product_total_qty']; ?>" name="product_total_qty" placeholder="Enter Qty" class="form-control" id="product_total_qty">
									    </div>
										<div class="form-group">
                                            <label for="exampleInputName1">Product Description</label>
											<textarea type="text" name="product_description" placeholder="Enter Description" class="form-control" id="ckeExample"><?php echo $ad['product_description']; ?></textarea>
											<div>
											<span id="s6" style="color:red;"></span></div>
									    </div>
									    <div class="form-group">
                                            <label for="exampleInputName1">Product Short Description</label>
											<textarea type="text" name="product_short_desc" placeholder="Enter Sort Description" class="form-control" id="ckeExample3"><?php echo $ad['product_short_desc']; ?></textarea>
											<div>
											<span id="s6" style="color:red;"></span></div>
									    </div>
										<div class="form-group">
                                            <label for="exampleInputName1" style="padding:10px 0px;">Product Additional Information</label>
											<textarea type="text" name="additional_information" placeholder="Enter Information" class="form-control" id="ckeExample2"><?php echo $ad['additional_information']; ?></textarea>
										</div>
										<div id="price">
										<div class="form-group">
                                            <label for="exampleInputName1" style="padding-top:20px;">Product Price</label>
											<input type="text" name="product_price" value="<?php echo $ad['product_price']; ?>" placeholder="Enter Price" class="form-control" id="product_price">
											<div>
											<span id="s5" style="color:red;"></span>
											</div>
									    </div>
										
											<input type="hidden" name="product_shipping_charge" value="<?php echo $ad['product_shipping_charge']; ?>" placeholder="Enter Charges" class="form-control" id="product_shipping_charge">
										
										
										<div class="form-group">
                                            <label for="exampleInputName1">Product Image</label>
											<input type="file" name="product_image" id="product_image" class="form-control">
											<div>
											<span id="s8" style="color:red;"></span></div>
									    </div>
										 <div class="col-sm-12" style="padding:10px;">
											<img id="imagePreview1" style="height:180px;width:250px;border-style:dotted;"  src="../images/product_image/<?php echo $ad['product_image'];?>" height="260px"> 
										</div>	
										<h4 class="card-title">Product SEO Details</h4>
										<div class="form-group">
                                            <label for="exampleInputName1">Page Title</label>
											<input type="text" value="<?php echo $ad['seo_title']; ?>" name="seo_title" placeholder="Enter Title" class="form-control" id="seo_title">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Title</label>
											<input type="text" value="<?php echo $ad['seo_meta_title']; ?>" name="seo_meta_title" placeholder="Enter Meta Title" class="form-control" id="seo_meta_title">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Description</label>
											<input type="text" value="<?php echo $ad['seo_meta_description']; ?>" name="seo_meta_description" placeholder="Enter Meta Description" class="form-control" id="seo_meta_description">
										</div>
										<div class="form-group">
                                            <label for="exampleInputName1">Meta Keywords</label>
											<input type="text" value="<?php echo $ad['seo_keywords']; ?>" name="seo_keywords" placeholder="Enter Meta Keywords" class="form-control" id="seo_keywords">
										</div>
										
										<button type="submit" id="reg"  class="btn btn-primary mr-2">Submit</button>
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
	$( document ).ready(function() {
		var x=$( "input[type=radio][name=optradio]:checked" ).val();
		inventory(x);
		//alert(x);
	});
	function inventory(val)
	{
		if (val=="2")
		{
		  $("#price").css("display","block");
		}
		else
		{
			$("#price").css("display","none");
		}
	}
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
					
					category_id: "required",
					product_name: "required",
					product_alias: "required",
					product_code: "required",
					inventory_id: "required",
					product_shipping_charge: "required",
					product_price: "required",
					product_gst: "required",
					
				},
				messages: {
					
					category_id: "Please select category name",
					product_name: "Please enter Product name",
					product_alias: "Please enter Product alias",
					product_code: "Please enter Product code",
					inventory_id: "Please select inventory name",
					product_shipping_charge: "Please enter shipping charge",
					product_price: "Please enter product price",
					product_gst: "Please enter product GST",
					
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

$("#product_image").change(function(){
    readURL1(this);
});

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
  
    var ckEditorID;

ckEditorID = 'ckeExample2';

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

var ckEditorID;

ckEditorID = 'ckeExample3';

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
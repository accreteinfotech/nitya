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
	<base href="<?php echo $site_url; ?>backyard/product_price/">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Edit Product Price</title>

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
                                    <h4 class="card-title">Edit Product Price</h4>
                                   <?php
										$ad=$link->rawQueryOne("select * from product_price p,inventory i,product pr, color c where p.inventory_id=i.inventory_id and p.product_id=pr.product_id and 
											p.color_id = c.color_id and  p.product_price_id=?",array($_REQUEST['cid']));
										if($link->count > 0)
										{
											
												$product_price_id=$ad['product_price_id'];
												$inventory_id=$ad['inventory_id'];
												$inventory_type=$ad['inventory_type'];
												$product_name=$ad['product_name'];
												$product_id=$ad['product_id'];
												$color_id = $ad['color_id'];
												$color_name = $ad['color_name'];
												//$product_price_amount=$ad['product_price_amount'];
												
										}
									?>
                                    <form action="update_product_price.php" name="f1" id="formsubmit" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
											<input type="hidden" id="product_price_id" name="product_price_id" class="form-control" value="<?php echo $product_price_id;?>">
										</div>
										 <label for="exampleInputName1">Product Name</label>
										 <div class="form-group">
                                            <select class="form-control" name="product_id" id="product_id">
											<option value="0">-- select product --</option>
												<?php
													
													$sql=$link->rawQuery("select * from product");
													if($sql)
													{
														foreach($sql as $cat)
														{
															?>
															<option value="<?php echo $cat['product_id']; ?>"<?php if($product_id == $cat['product_id']){ echo 'selected';}?>><?php echo $cat['product_name']; ?></option>
															<?php
														}
													}
												?>
											</select>
											<div><span id="s5" style="color:red;font-size: 14px;"></span></div>
                                        </div>
										<div class="form-group">
										<label for="exampleInputName1">Inventory Name</label>
                                            <select class="form-control" name="inventory_id" id="inventory_id">
											<option value="0">-- select inventory --</option>
												<?php
													$sql=$link->rawQuery("select * from inventory");
													if($sql)
													{
														foreach($sql as $cat)
														{
															?>
															<option value="<?php echo $cat['inventory_id']; ?>"<?php if($inventory_id == $cat['inventory_id']){ echo 'selected';}?>><?php echo $cat['inventory_type']; ?></option>
															<?php
														}
													}
												?>
											</select>
											<div><span id="s1" style="color:red;font-size: 14px;"></span></div>
                                        </div>

                                        <div class="form-group">
										<label for="exampleInputName1">Color Name</label>
                                            <select class="form-control" name="color_id" id="color_id">
											<option value="0">-- select color --</option>
												<?php
													$sql=$link->rawQuery("select * from color");
													if($sql)
													{
														foreach($sql as $cat)
														{
															?>
															<option value="<?php echo $cat['color_id']; ?>"<?php if($color_id == $cat['color_id']){ echo 'selected';}?>><?php echo $cat['color_name']; ?></option>
															<?php
														}
													}
												?>
											</select>
											<div><span id="s1" style="color:red;font-size: 14px;"></span></div>
                                        </div>
										
										<!--<div class="form-group">
                                            <label for="exampleInputName1">Product Price</label>
                                            <input type="text" class="form-control" id="product_price_amount" name="product_price_amount" placeholder="Price" value="<?php //echo $product_price_amount;?>">
											<div><span id="s2" style="color:red;font-size: 14px;"></span></div>
                                        </div>-->
                                        
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
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
					product_id: "required",
					product_price: "required",
					inventory_id: "required",
					material_id: "required",
					
				},
				messages: {
					product_id: "Please select product name",
					product_price: "Please enter product price",
					inventory_id: "Please select inventory name",
					material_id: "Please select matrial name",
					category_image: "Please select category image",
					
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

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagePreview2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#product_second_image").change(function(){
    readURL2(this);
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
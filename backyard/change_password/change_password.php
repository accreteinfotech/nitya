<?php
	ob_start();
?>
<!doctype html>
<html lang="en">
<?php
	include '../include/connect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Change Password</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="../style.css">

</head>

<body class="dark-color-overlay bg-img" style="background-image: url(img/bg-img/8.jpg);">
    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-sm-10 col-md-6 col-lg-5 mx-auto">
                    <!-- Middle Box -->
                    <div class="middle-box lock-screen text-center">
                        <div class="card">
                            <div class="card-body">
                                <a href="../dashboard/Dashboard"><img class="lock-profile-thumb" src="../img/core-img/side-logo.png" style="border-radius:0px;height:70px;width:280px;" alt="img"></a>
                                <form class="pt-4" type="POST" id="login_form">
                                    <div class="form-group">
                                        <label class="lock-text text-dark">Change Password</label>
                                        <input type="password" class="form-control height-50 text-center" id="current_password" name="current_password" placeholder="Current Password">
                                    </div>
									<div class="form-group">
                                        <input type="password" class="form-control height-50 text-center" name="new_password" id="new_password" placeholder="New Password">
                                    </div>
									<div class="form-group">
                                        <input type="password" class="form-control height-50 text-center" id="c_password" name="c_password" placeholder="Confirm Password">
                                    </div>
									
									<p id="rerror" style="color: red;font-size: 16px;font-weight:500;"></p>
									
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-primary btn-block line-height-50-p-0 height-50" value="submit">
                                    </div>
                                    <div class="mt-3 text-center">
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="../js/jquery.min.js"></script>
	<script>

	$("#login_form").submit(function(e) {
		$.ajax({
		   type: "POST",
		   url: "change_password_code.php",
		   data: $("#login_form").serialize(),
				
				// serializes the form's elements.
		   success: function(data)
		   {
				$("#rerror").html(data);
				$.trim(data);
				if(data == '')
				{
					window.location.href='../dashboard/dashboard.php';
				}
				else
				{
					$("#rerror").css("color","red");
				}
		   }
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	
	
	</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>

    <!-- Active JS -->
    <script src="../js/default-assets/active.js"></script>

</body>

</html>
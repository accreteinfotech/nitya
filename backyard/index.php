<?php
	ob_start();
?>
<!doctype html>
<html lang="en">
<?php
	include 'include/connect.php';
	
?>
<head>
    <meta charset="UTF-8">
		
		
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $project_name; ?> | Login </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="style.css">

</head>

<body class="dark-color-overlay bg-img" style="background-image: url(img/bg-img/8.jpg);">

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-lg-8" style="max-width:100%">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card mb-0">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
								 <div class="col-md-6">
                                        <div class="xs-d-none">
                                             <img src="img/core-img/logo.png" alt="" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Logo -->
                                       

                                        <h4 class="font-22 mb-30" style="text-align:center;">Sign In</h4>

                                        <form class="form" method="post" id="login_form" >
                                            <div class="form-group">
                                                <label class="float-left" for="emailaddress">Username</label>
                                                <input class="form-control" type="text" id="username" name="username" value="<?php if(isset($_COOKIE['user'])){ echo $_COOKIE['user']; } ?>" placeholder="Enter your Username">
                                            </div>

                                            <div class="form-group">
                                                <!--<a href="forgot_password.php" class="text-dark float-right"><span class="font-12 text-primary">Forgot your password?</span></a>-->
                                                <label class="float-left" for="password">Password</label>
												<input class="form-control" type="password"  id="password" name="password" value="<?php if(isset($_COOKIE['pwd'])){ echo $_COOKIE['pwd']; } ?>" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="custom-control custom-checkbox pl-0">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" checked>
                                                        <label class="custom-control-label" for="customCheck1"><span class="font-16">Remember me</span></label>
                                                    </div>
                                                </div>
													<div>
													<p id="rerror" style="color: red;
													font-size: 16px;font-weight:500;
													"></p>
													</div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                            </div>

                                        </form>
                                    </div>
									
									<!-- end card-body -->
                                </div>
                                <!-- end card -->
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
	<script src="js/jquery.min.js"></script>
	
<script>

	$("#login_form").submit(function(e) {
		$.ajax({
		   type: "POST",
		   url: "login_code.php",
		   data: $("#login_form").serialize(),
				
				// serializes the form's elements.
		   success: function(data)
		   {
				$("#rerror").html(data);
				if(data == '')
				{
					window.location.href='dashboard/dashboard.php';
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
    
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bundle.js"></script>

    <!-- Active JS -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>
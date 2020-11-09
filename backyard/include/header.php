 <script src="../js/jquery.min.js"></script>
 <style>
 

* {
   font-family: 'Roboto', sans-serif;
}

.dropdown {
   display: inline-block;
}
ul.dropdown-menu {
  min-width: 500px;
   margin-top: 2px;
}
.dropdown-notify {
   display: block;
  padding: 10px 15px;
}
.dropdown-notify:hover {
   background: #eee;
}
.dropdown-notify-btn {
   border: 2px solid #000;
   border-radius: 5px;
   padding: 8px;
   background: white;
   text-transform: uppercase;
   font-weight: 500;
   color: #173e88;
}
.dropdown-notify-header {
   color: white;
   margin-top:-8px;
   border-top-left-radius: 5px;
   border-top-right-radius: 5px;
   background: #347ab8;
   font-weight: 700;
}
.dropdown-notify-header:hover {
   background: #347ab8;
   color: white;
   text-decoration: none;
}
.dropdown-menu a {
   color: #333;
}
.dropdown-menu a:hover {
   color: #333;
   text-decoration: none;
}
.badge {
   background: #F93943;
   color:#fff;
}
.fa-envelope-o {
   font-size: 18px;
   position: relative;
   top: 1px;
   left: -3px;
   margin-right: 2px;
   color: #173e88;
}
.notify-title {
   font-weight: 700;
}
.notify-message {
   margin-bottom: 5px;
}
.notify-date {
  margin-bottom: 0px;
  font-size: 12px;
  letter-spacing: 1px;
}
 </style>
 <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo mr-3 mr-sm-4">
                        <a href="../dashboard/dashboard.php"><img src="../img/core-img/logo.png" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="ecaps-triggers mr-1 mr-sm-3">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>

                    <!-- Left Side Nav -->
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class="ti-align-left"></i>
						
                    </div>

                    <!-- Top Bar Nav -->
					<li class="dropdown messages-menu">
                        <a href="#" id="dropdown-toggle1" class="dropdown-toggle dropdown-notify-btn" data-toggle="dropdown">
                        <i class="fa fa-envelope-o" style="color:#000;"></i>
						<?php
						    $query = "SELECT * FROM order_product where notification_status=1 and is_active=1 ORDER BY order_product_id DESC";
							$result = mysqli_query($con, $query);
							if(mysqli_num_rows($result) > 0)
							{
								$output = '';	
							}
							else
							{
								$output = '0';	
							}
							
						?>
                        <span class="label label-success count badge"><?php echo mysqli_num_rows($result);?></span>
                        </a>
                        
                         <ul class="dropdown-menu" id="q1"  style="overflow: scroll;">
                        <a href="#">
                          <li class="dropdown-notify dropdown-notify-header" style="background-color:#000;">
                            Notifications
                          </li>
                        </a>
     <?php
							if(mysqli_num_rows($result) > 0)
							{
							 while($row = mysqli_fetch_array($result))
							 {
							     
							   $output .= '
							   
							   <a onclick="read('.$row['order_product_id'].')" >
                                  <li class="dropdown-notify" onclick="read('.$row['order_product_id'].')">
                                    <span class="notify-title">'.$row["full_name"].'</span></br>
                                    <span class="notify-msg"><span class="badge">New</span> Order Recived</span>
                                    <span class="notify-date">'. date('d,M Y',strtotime($row["order_date_time"])).'</span>
                                  </li>
                                </a>
							   ';

							 }
							}
							else{
								
						   $output .= '
							   <a href="#">
                                  <li class="dropdown-notify">
                                    <p>No Notification Found.</p>
                                  </li>
                                </a>
							   ';

	 						}
							echo $output;
							?>
    </ul>
                     </li>
                    <ul class="right-side-content d-flex align-items-center">
					
						<a href="../logout.php" class="dropdown-item"><img style="height: 30px;width: 30px;"  src="../img/power.png"></a>
                    </ul>
                </div>
            </header>
			 <script>

function load_unseen_notification2()
   {
      // alert("hello");
       $.ajax({
           			url:"../include/fetch2.php",
					success:function(data)
					{
					//	alert(data);
					var nameArr = data.split('|||');
						
						    //alert(nameArr[0]);
						$('#q1').html(nameArr[0]);
							$('.count').html(nameArr[1]);
							if(nameArr[1]>0)
							{
							     //var audio = new Audio('../to-the-point.mp3');
            //                          audio.play();
							}
					
					}
				});
				
   }
   function read(val)
   {
	 load_unseen_notification('yes',val);
   }
  /*$(document).on('click', "#dropdown-toggle1", function()
  {
		//$('.count').html('');
		load_unseen_notification('yes');
	 
	});*/
function load_unseen_notification(view = '',val)
			{
			
			 $.ajax({
			  url:"../include/fetch.php",
			  method:"POST",
			  data:"view="+view+"&order_product_id="+val,
			  success:function(data)
			  {
			 
				//alert(data);
			  }
			 });
			}
   
			
			 setInterval(function(){
                load_unseen_notification2();
            }, 500);
   
		
    </script>
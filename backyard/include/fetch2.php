<?php
include 'connect.php';
session_start();


// $con = mysqli_connect("localhost", "root", "", "notif");

$query = "SELECT * FROM order_product where notification_status=1 and is_active=1 ORDER BY order_product_id DESC";
$result = mysqli_query($con, $query);
$output ='<a href="#">
                          <li class="dropdown-notify
                          dropdown-notify-header" style="background-color:#000;">
                            Notifications
                          </li>
                        </a>';
						if(mysqli_num_rows($result) > 0)
						{
						 while($row = mysqli_fetch_array($result))
						 {
						   $output .= '
							   <a onclick="read('.$row['order_product_id'].')">
                                  <li class="dropdown-notify" onclick="read('.$row['order_product_id'].')">
                                    <span class="notify-title">'.$row["full_name"].'</span></br>
                                    <span class="notify-msg"><span class="badge">New</span> Order Recived
                                    </span>
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
	

$result_query = mysqli_query($con, "SELECT * FROM order_product where notification_status=1 and is_active=1 ORDER BY order_product_id DESC");
$count = mysqli_num_rows($result_query);

echo $output."|||".$count;

?>
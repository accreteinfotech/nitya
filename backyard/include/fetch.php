<?php
include 'connect.php';
session_start();

$order_product_id=$_REQUEST['order_product_id'];

if(isset($_POST['view'])){
	if($_POST["view"] != '')
	{
		echo $update_query = "UPDATE order_product SET notification_status = 0 WHERE order_product_id=$order_product_id";
		mysqli_query($con, $update_query);
	}
	echo '1';
}
else{
	echo '0';
}
?>
<?php
	include 'MysqliDb.php';
 	$link=new MysqliDb("localhost","root","","nitya");
 	$con = mysqli_connect('localhost','root','','nitya');
	
//	$link=new MysqliDb("localhost","thehonvq_waxberr","thehonvq_waxberr","thehonvq_waxberr");
//	$con = mysqli_connect('localhost','thehonvq_waxberr','thehonvq_waxberr','thehonvq_waxberr');
	
	ini_set('POST_MAX_SIZE','64M');
	ini_set('UPLOAD_MAX_FILESIZE','64M');
	$project_name="EvolveEssential";
	
	$site_url="http://localhost/nitya/";
//	$site_url="http://accreteit.com/wax-berry/";
	$project_logo=$site_url."images/logo.png";
	
	/*$control=$link->rawQueryOne("select * from inventory_control");
	$warning=$control['inventory_control_warning'];
	$danger=$control['inventory_control_danger'];
	$page_name= basename($_SERVER['PHP_SELF']);
	$per_page =30;*/
	//define how many products for a page
	
	//Email Config
	$host_name="mail.accreteit.com";
	$port="587";
	$email_username="waxberry@accreteit.com";
	$email_password="Kem_6o??";
	$team_name="Wax-Berry Team";
	$send_address="harsh.fruitwala6579@gmail.com";
	
	//Payment Getway API 
	//Live Api
	//$payment_getway_api="rzp_live_jqKU7RvCPSeCTd";
	//Test APi
/*	$payment_getway_api="rzp_test_1WmQxJ2AcjbwFz";
	
	$company_name="Wax Berry Weaves";
	$company_description="";*/
?>
<?php
	require_once '../config.php';
		require_once '../include/connect.php';
	require_once "../phpmailer/class.phpmailer.php";
    	$cid=$_GET['pid'];
	try {
			
	
	
    	$link->where("order_product_id",$cid);
    	$a=$link->update("order_product",array("status_id"=>3));
    	
    	if($a)
    	{
    		header("location:view_order.php");
    	}
        $b=$link->rawQueryOne("select * from order_product where order_product_id=?",array($cid));
			//$lastID = $DB->lastInsertId();
        $od_mail=$b['order_mail'];
        
       
        
       $message = '<html><head>
               <title>Order Dispatch Success</title>
               </head>
               <body>
               <img src="../category-icon.jpg">
               ';
   
        $message .= '<h3>Your Order Id '.$cid.' Dispatch Successfully.</h1>';
        $message .= '<h3>Thank You For Order At Competent Agriculture Machinery.</h1>';
      
      // $message .= '<h4>CV : <img height="300px" width="300px" src="admin/images/career_image/' .$pimage . '"></h2>';
       $message .= "</body></html>";
        
     $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = false;                 // sets the prefix to the servier
        $mail->Host = "mail.camagro.in";      // sets GMAIL as the SMTP server
        $mail->Port = 587;  
        
    $mail->Username = 'caminfo@camagro.in';
    $mail->Password = 'Kem_6o??';
    
   
    $mail->SetFrom('caminfo@camagro.in', 'Competent Agriculture Machinery');
     $mail->AddAddress($od_mail);
    
     $mail->Subject = trim("Order dispatch Successfully");
     $mail->MsgHTML($message);
 
    		try {
              $mail->send();
              echo $msg = "An email has been sent.";
              $msgType = "success";
              echo $msg;
            } catch (Exception $ex) {
              echo $msg = $ex->getMessage();
              $msgType = "warning";
            }
    	
    	}
    	 catch (Exception $ex) {
        echo $ex->getMessage();
      }
      
 
?>
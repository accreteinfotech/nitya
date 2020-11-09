<?php
	ob_start();
?>
<?php
	include '../include/connect.php';
	
	$sco_codes_description=$_REQUEST['sco_codes_description'];
	$seo_codes_id="4";
	$link->where("seo_codes_id",$seo_codes_id);
	$sql=$link->update("seo_codes",array("sco_codes_description"=>$sco_codes_description));
	if($sql)
	{
		header("location:Search-Consol");
	}
?>	
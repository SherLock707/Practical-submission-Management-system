<?php
include("../connection/connect.php");
if($_GET['Expid'] and $_GET['data'] and $_GET['field'])
{
	$Expid = $_GET['Expid'];
	$data = $_GET['data'];
	$field = $_GET['field'];
	if(mysqli_query($conn,"update experiment set $field='$data' where Expid='$Expid'"))
	echo 'success';
}
include("../connection/close.php");
?>
<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
include("../connection/connect.php");
$Batch = $_GET['Batch'];
$Class = $_GET['Class'];
$Subid = $_GET['Subid'];
$sql = "Delete from `student-exp` ORDER BY SEid DESC LIMIT 1";
//echo $sql;
mysqli_query($conn,$sql) or die(mysqli_error($conn));
$_SESSION['undo'] =$_SESSION['undo'] - 1;
//echo"<br>".$_SESSION['undo'];
include("../connection/close.php");
header("Location: batchlist.php?Class=".$Class."&Batch=".$Batch."&Subid=".$Subid);

?>
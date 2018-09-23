<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
include("../connection/connect.php");
$Expid = $_GET['Expid'];
$Sid = $_GET['Sid'];
$Batch = $_GET['Batch'];
$Class = $_GET['Class'];
$Subid = $_GET['Subid'];
$today=date('Y-m-d');
$sql = "INSERT INTO `student-exp` (`Expid`,`Sid`,`Sub_date`,`Marks`,`status`) VALUES (".$Expid.",".$Sid.",'".$today."',5,0)";

echo $sql;
mysqli_query($conn,$sql) or die(mysqli_error());
$_SESSION['undo'] =$_SESSION['undo'] + 1;
include("../connection/close.php");
header("Location: batchlist.php?Class=".$Class."&Batch=".$Batch."&Subid=".$Subid);

?>
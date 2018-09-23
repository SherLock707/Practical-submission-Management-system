<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
include("../connection/connect.php");
$Expno = stripslashes($_POST['Expno']);
$Title = stripslashes($_POST['Title']);
$Start = stripslashes($_POST['Start']);
$End = stripslashes($_POST['End']);
$Tid = stripslashes($_POST['Tid']);
$Subid = stripslashes($_POST['Subid']);

$sql  = "INSERT INTO `experiment` (`Expno`, `Title`, `Subid`, `Tid`, `Start_date`, `End_date`) VALUES ({$Expno},'{$Title}',{$Subid},{$Tid},'{$Start}','{$End}')";
mysqli_query($conn,$sql) or die("could not execute query");
mysqli_close($conn);
include("../connection/connect.php");
$sql="select Expid from experiment WHERE Expno=".$Expno." AND Title='".$Title."' AND Subid=".$Subid;
echo $sql;
$result2=mysqli_query($conn,$sql) or die("could not execute query1");
$rows=mysqli_fetch_assoc($result2);
$Expid=$rows['Expid'];
//################################# file upload
if(($_FILES['userfile']['size']) > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
$query = "INSERT INTO upload (expid,name, size, type, content ) ".
"VALUES ('$Expid', '$fileName', '$fileSize', '$fileType', '$content')";
mysqli_query($conn,$query) or die('Error, query failed');
}
//#################################
include("../connection/close.php");
header('Location: experiment.php?Subid='.$Subid, true);

?>
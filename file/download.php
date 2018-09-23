<?php
if(isset($_GET['id']))
{
include("../connection/connect.php");
$id    = $_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE expid = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
include("../connection/close.php");
//header('Location: experiment.php?Subid='.$Subid, true);
exit;
}

?>
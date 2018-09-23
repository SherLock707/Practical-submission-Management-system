<?php
session_start();
include("../connection/connect.php");
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
//$password = password_hash($password,PASSWORD_BCRYPT);
if($username && $password)
{
$add="SELECT Tid,Name From teacher WHERE Username='{$username}' AND Password='{$password}'";
$query=mysqli_query($conn,$add);
$numrow = mysqli_num_rows($query);
	if ($numrow!=0)
	{
		$rows=mysqli_fetch_assoc($query);
		$Tid = $rows[Tid];
		$Name = $rows['Name'];
		$_SESSION['Tid'] = $Tid;
		$_SESSION['Name'] = $Name;
		// echo $Tid;
		// echo $Name;
		//header('Location: subject.php?Tid='.$Tid.'&Name='.$Name.'', true);
		$_SESSION['undo'] =0;
		include("../connection/close.php");
		header('Location: subject.php');
	}
	else{
	//echo"User Does not exist";
	//echo '<script language="javascript">alert("Please enter valid username & password."); </script>';
	include("../connection/close.php");
	header('Location: login.php?error=1');
	}
	}
else{
   die("Please enter your username and Password!");
}
?>

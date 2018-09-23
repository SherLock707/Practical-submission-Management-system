<?php
// $Tid = $_GET['Tid'];
// $Name = $_GET['Name'];
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Tid = $_SESSION['Tid'];
$Name = $_SESSION['Name'];
include("../common/header.php");
include("../connection/connect.php");
?>
<div class="col-sm-8">
<h3>Subject Listing</h3>
<div align="left">
<?php
Echo "<i>Hello, <b>".$Name."! <span class='glyphicon glyphicon-user'></span><b></i>";
$_SESSION['undo'] = 0;
?>
</div>
<hr color="#d5d5d5">
 <center>
<table class="table table-striped">
<?php
   $sql="select * from subject WHERE Tid=".$Tid;
  $result=mysqli_query($conn,$sql) or die("could not execute query1");
  $numrows= mysqli_num_rows($result);
 if($numrows==0)
{
echo "<tr class='warning'><td><b><center><br><br><br><br>No Subject Present.</center></b></td></tr>";
}
 
  $list.="<thead>";
  $list.="<tr class='success'>";
  $list.="<th><span class='glyphicon glyphicon-pushpin'></span> SubID</th>";
  $list.="<th><span class='glyphicon glyphicon-tasks'></span> Subject</th>";
  $list.="<th><span class='glyphicon glyphicon-blackboard'></span> Class</th>";
  $list.="<th><span class='glyphicon glyphicon-th'></span> No of expts</th>";
$list.="<th><span class='glyphicon glyphicon-cog'></span> Action</th>";
  $list.="</tr>";
  $list.="</thead>";
    $list.="<tbody>";
	
  while($rows=mysqli_fetch_assoc($result))
   {
     $list.="<tr>";
     $list.="<td>".$rows['Subid']."</td>"; 
     $list.="<td>".$rows['Name']."</td>";
     $list.="<td>".$rows['Class']."</td>";
	 
$sql2="select * from experiment WHERE Subid=".$rows['Subid'];
$result2=mysqli_query($conn,$sql2) or die("could not execute query2");
$count= mysqli_num_rows($result2);
	 
	 $list.="<td>".$count."</td>";
	 $list.="<td><button type = 'button' class = 'btn btn-primary glyphicon glyphicon-search' onclick=javascript:window.location.href='experiment.php?Subid=".$rows['Subid']."'> View</button>";
     $list.="  <button type = 'button' class = 'btn btn-success active glyphicon glyphicon-plus' onclick=javascript:window.location.href='addexp.php?Subid=".$rows['Subid']."'> Add</button>";
	 $list.="  <button type = 'button' class = 'btn btn-purple glyphicon glyphicon-exclamation-sign' onclick=javascript:window.location.href='batch2.php?Subid=".$rows['Subid']."&Class=".$rows['Class']."'> Late</button>";
	 $list.="  <button type = 'button' class = 'btn btn-warning glyphicon glyphicon-flag' onclick=javascript:window.location.href='batch.php?Subid=".$rows['Subid']."&Class=".$rows['Class']."'> Submissions</button></td>";

	$list.="</tr>";
   }
   $list.="</tbody>";      
   $list.="</table>";
   echo($list); 
   //#################################################################
if($Tid == 3)
{
	echo"<br><b>Other faculties subjects</b>";
	echo"<table class='table table-bordered'>";
	$sql="select * from subject WHERE Tid!=".$Tid;
  $result=mysqli_query($conn,$sql) or die("could not execute query1");
  $numrows= mysqli_num_rows($result);
 if($numrows==0)
{
echo "<tr class='warning'><td><b><center><br><br><br><br>No other Subject Present.</center></b></td></tr>";
}
 
  echo"<thead>";
  echo"<tr class='warning'>";
  echo"<th><span class='glyphicon glyphicon-pushpin'></span> SubID</th>";
  echo"<th><span class='glyphicon glyphicon-tasks'></span> Subject</th>";
  echo"<th><span class='glyphicon glyphicon-blackboard'></span> Class</th>";
  echo"<th><span class='glyphicon glyphicon-th'></span> No of expts</th>";
echo"<th><span class='glyphicon glyphicon-cog'></span> Action</th>";
  echo"</tr>";
  echo"</thead>";
    echo"<tbody>";
	
  while($rows=mysqli_fetch_assoc($result))
   {
    echo"<tr>";
     echo"<td>".$rows['Subid']."</td>"; 
    echo"<td>".$rows['Name']."</td>";
     echo"<td>".$rows['Class']."</td>";
	 
$sql2="select * from experiment WHERE Subid=".$rows['Subid'];
$result2=mysqli_query($conn,$sql2) or die("could not execute query2");
$count= mysqli_num_rows($result2);
	 
	 echo"<td>".$count."</td>";
	 echo"<td><button type = 'button' class = 'btn btn-primary glyphicon glyphicon-search' onclick=javascript:window.location.href='experiment.php?Subid=".$rows['Subid']."'> View</button>";
     //echo"  <button type = 'button' class = 'btn btn-success active glyphicon glyphicon-plus' onclick=javascript:window.location.href='addexp.php?Subid=".$rows['Subid']."'> Add</button>";
	 echo"  <button type = 'button' class = 'btn btn-purple glyphicon glyphicon-exclamation-sign' onclick=javascript:window.location.href='batch2.php?Subid=".$rows['Subid']."&Class=".$rows['Class']."'> Late</button>";
	 //echo"  <button type = 'button' class = 'btn btn-warning glyphicon glyphicon-flag' onclick=javascript:window.location.href='batch.php?Subid=".$rows['Subid']."&Class=".$rows['Class']."'> Submissions</button></td>";

	echo"</tr>";
   }
   echo"</tbody>";      
   echo"</table>";
}
//###################################################################
  ?>

</center>
 
 </div>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>
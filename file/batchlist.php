<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Batch = $_GET['Batch'];
$Class = $_GET['Class'];
$Subid = $_GET['Subid'];
include("../common/header.php");
include("../connection/connect.php");

?>
<div class="col-sm-8">
<h3>Student Listing(<i><?php echo $Class." - ".$Batch ?></i>)</h3>
<hr color="#d5d5d5">
<div align="left" style="margin-bottom: -40px; margin-left: 10px;">
<?php
	if($_SESSION['undo'] == 0){
	echo"<button type = 'button' class = 'btn btn-primary disabled glyphicon glyphicon-repeat'> Undo</button>";
	}
	else if($_SESSION['undo']>0){
	echo"<button type = 'button' class = 'btn btn-primary active glyphicon glyphicon-repeat' onclick=javascript:window.location.href='undo.php?Class=".$Class."&Batch=".$Batch."&Subid=".$Subid."'> Undo</button>";
	}
?>
</div>
<div align="right">
<?php		
		echo" <i><button type = 'button' class = 'btn btn-success'></button>&nbsp;Submitted &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>";
		echo" <button type = 'button' class = 'btn btn-warning'></button>&nbsp;Submission due&nbsp;<br>";
		echo" <button type = 'button' class = 'btn btn-purple'></button>&nbsp;Late Submission<br>";	
		echo" <button type = 'button' class = 'btn btn-danger'></button>&nbsp;Not submitted  &nbsp;&nbsp;&nbsp;</i>";	
?>
</div>
 <center>
<table class="table table-striped">
<?php
   $sql="select * from student WHERE Class='".$Class."' AND Batch='".$Batch."'";
   if($Batch == 'All')
   {
      $sql="select * from student WHERE Class='".$Class."'";
   }
  $result=mysqli_query($conn,$sql) or die("could not execute query1");
  
	$list="<thead>";
	$list="<tr class='success'>";
	$list.="<th><span class='glyphicon glyphicon-pushpin'></span> Roll no</th>";
	$list.="<th><span class='glyphicon glyphicon-user'></span> Name</th>"; 
	$sql2="select * from experiment WHERE Subid='".$Subid."'";
	//$result2=mysqli_query($conn,$sql2) or die("could not execute query2");
	// $num= mysqli_num_rows($result);
	$list.="<th><span class='glyphicon glyphicon-folder-open'></span> Experiments</th>";	
  
  $list.="</tr>";
  $list.="</thead>";
    $list.="<tbody>";
$today=date('Y-m-d');
  while($rows=mysqli_fetch_assoc($result))
   {
     $list.="<tr>";
     $list.="<td>".$rows['Rollno']."</td>"; 
     $list.="<td>".$rows['Name']."</td>";
	$list.="<td>";
	$tempid = $rows['Sid'];
	$result2=mysqli_query($conn,$sql2) or die("could not execute query2");	
		$num=1;
	while($rows2=mysqli_fetch_assoc($result2))
	{
	$End_date=$rows2['End_date'];
	$sql3  = "SELECT * FROM `student-exp` WHERE `Sid`=".$tempid." AND `Expid`=".$rows2['Expid'];
	//echo "<br>".$sql3;
	$result3=mysqli_query($conn,$sql3) or die("could not execute query3");
	$tempnum = mysqli_num_rows($result3);
	$rowskk=mysqli_fetch_assoc($result3);
	$sat=$rowskk['status'];
	if($tempnum!=0 && $sat == 0)
	{
 		  $list.=" <button type = 'button' class = 'btn btn-purple glyphicon glyphicon' style='margin-top: 4px';>Expno-".$num."</button>";	
     }
	 else if($tempnum == 0 && $End_date>=$today)
	 {
	  	$list.=" <button type = 'button' class = 'btn btn-warning glyphicon glyphicon' style='margin-top: 4px'; onclick=javascript:window.location.href='updateexp.php?Sid=".$rows['Sid']."&Expid=".$rows2['Expid']."&Class=".$Class."&Batch=".$Batch."&Subid=".$Subid."'>Expno-".$num."</button>";	
	 }
	 else if($tempnum!=0)
	 {
			$list.=" <button type = 'button' class = 'btn btn-success glyphicon glyphicon' style='margin-top: 4px';>Expno-".$num."</button>";
	 }
	 else if($tempnum == 0)
	 {
	  $list.=" <button type = 'button' class = 'btn btn-danger glyphicon glyphicon' style='margin-top: 4px'; onclick=javascript:window.location.href='updateexp2.php?Sid=".$rows['Sid']."&Expid=".$rows2['Expid']."&Class=".$Class."&Batch=".$Batch."&Subid=".$Subid."'>Expno-".$num."</button>";	
	 }
	 $num++;
	 }
	 $list.="</td>";
	 $list.="</tr>";
   }
   $list.="</tbody>";      
   $list.="</table>";
   echo($list); 
?>

</center>
 
 </div>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>
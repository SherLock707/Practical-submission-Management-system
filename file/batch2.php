<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Subid = $_GET['Subid'];
$Class = $_GET['Class'];
include("../common/header.php");
include("../connection/connect.php");

?>
<div class="col-sm-8">
<h3>Batch Listing</h3>
<hr color="#d5d5d5">
 <center>
<table class="table table-striped">
<?php
	$temp=1;
	$list="<thead>";
	$list.="<th><span class='glyphicon glyphicon-list-alt'></span> Batch</th>";
	$list.="<th><span class='glyphicon glyphicon-th'></span> No of students</th>";
	// $list.="<th>Submitted</th>";
	// $list.="<th>Submission Due</th>"; 
	$list.="<th><span class='glyphicon glyphicon-cog'></span> Action</th>";	

  $list.="</tr>";
  $list.="</thead>";
    $list.="<tbody>";
	$batch = array('All','A','B','C','D');
	$i=0;
  while($i<5)
   {
     $list.="<tr>";
     $list.="<td>".$batch[$i]."</td>"; 
$sql="select * from student WHERE Class='".$Class."' AND Batch='".$batch[$i]."'";
	 if($batch[$i] == 'All'){
$sql="select * from student WHERE Class='".$Class."'";
}
	//echo $sql."<br>";
$count2=0;
	//#######################################################
	$result=mysqli_query($conn,$sql) or die("could not execute query1");

	while($rows=mysqli_fetch_assoc($result))
	{
	$sql2="select * from experiment WHERE Subid=".$Subid;
	$result2=mysqli_query($conn,$sql2) or die("could not execute query4");
	while($rows2=mysqli_fetch_assoc($result2)){
	$sql3="select * from `student-exp` WHERE Sid='".$rows['Sid']."' And Expid='".$rows2['Expid']."'";
	//echo $sql3."<br>";
	$result3=mysqli_query($conn,$sql3) or die("could not execute query3");
	$num= mysqli_num_rows($result3);
	if($num==0)
	{
	$temp=0;
	//echo $temp."<br>";
	}
	}
	if($temp==0)
	{
	$count2++;
	$temp=1;
	}
	}
//echo $count2."<br>";

	//#######################################################
$result4=mysqli_query($conn,$sql) or die("could not execute query");
$count= mysqli_num_rows($result4);

     $list.="<td>".$count2."/".$count."</td>"; 
		$list.="<td><button type = 'button' class = 'btn btn-danger glyphicon glyphicon-search' onclick=javascript:window.location.href='batchlist2.php?Class=".$Class."&Batch=".$batch[$i]."&Subid=".$Subid."'> View late submissions</button></td>";
     $list.="</tr>";
	  $i++;
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
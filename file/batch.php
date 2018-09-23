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
	$list="<thead>";
	$list="<tr class='success'>";
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
$result=mysqli_query($conn,$sql) or die("could not execute query");
$count= mysqli_num_rows($result);
     $list.="<td>".$count."</td>"; 
		$list.="<td><button type = 'button' class = 'btn btn-primary glyphicon glyphicon-search' onclick=javascript:window.location.href='batchlist.php?Class=".$Class."&Batch=".$batch[$i]."&Subid=".$Subid."'> View</button></td>";
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
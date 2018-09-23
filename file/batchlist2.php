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
<div>
<h3>Student Listing(<i><?php echo $Class." - ".$Batch ?></i>)</h3>
<h5>Not submitted at least one</h5>
<hr color="#d5d5d5">
<div align="right">
<table class="table table-sm-3">
<?php	
		echo"<tr><td class='bg-warning'><span class='glyphicon glyphicon-minus-sign'></span> Not submitted</td>";
		echo"<td class='bg-danger'><span class='glyphicon glyphicon-remove-sign'></span> Past due &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";	
		echo" <td class='bg-purple'><span class='glyphicon glyphicon-ok-circle'></span> Late submission</td>";	
		echo" <td class='bg-success'><span class='glyphicon glyphicon-ok-sign'></span> submitted&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";	

?>
</table>
</div>
</div>
 <center>
<table class="table table-bordered table-hover table-responsive">
<?php
   $sql="select * from student WHERE Class='".$Class."' AND Batch='".$Batch."'";
   if($Batch == 'All')
   {
      $sql="select * from student WHERE Class='".$Class."'";
   }
  $result=mysqli_query($conn,$sql) or die("could not execute query1");
  
	$list="<thead>";
	$list="<tr class='bg-success'>";
	$list.="<th><span class='glyphicon glyphicon-pushpin'></span> Roll no</th>";
	$list.="<th><span class='glyphicon glyphicon-user'></span> Name</th>"; 

	$sql2="select * from experiment WHERE Subid='".$Subid."' ORDER BY Expno";
	$result2=mysqli_query($conn,$sql2) or die("could not execute query2");
	while($rows2=mysqli_fetch_assoc($result2)){
	$list.="<th><span class='glyphicon glyphicon-folder-open'></span> Expt no ".$rows2['Expno']."</th>";
}	
  $list.="</tr>";
  $list.="</thead>";
    $list.="<tbody>";
//$today=date_create(date('Y-m-d'));
	$temp=1;
  while($rows=mysqli_fetch_assoc($result))
   {
	$result2=mysqli_query($conn,$sql2) or die("could not execute query4");
	while($rows3=mysqli_fetch_assoc($result2))
	{
	$sql3="select * from `student-exp` WHERE Sid='".$rows['Sid']."' And Expid='".$rows3['Expid']."'";
	//echo $sql3."<br>";
	$result3=mysqli_query($conn,$sql3) or die("could not execute query3");
	$num= mysqli_num_rows($result3);
	$rows77=mysqli_fetch_assoc($result3);
	if($num==0)
	{
	$temp=0;
	}
	}
	if($temp==0 || ($temp!=0 && $rows77['status'] == 0)){
     $list.="<tr>";
     $list.="<td>".$rows['Rollno']."</td>"; 
     $list.="<td>".$rows['Name']."</td>";
	 
	$result2=mysqli_query($conn,$sql2) or die("could not execute query2");
	while($rows2=mysqli_fetch_assoc($result2)){
	$sql5="select * from `student-exp` WHERE Sid='".$rows['Sid']."' And Expid='".$rows2['Expid']."'";
	$result5=mysqli_query($conn,$sql5) or die("could not execute query5");
	$rows5=mysqli_fetch_assoc($result5);
	$numm = mysqli_num_rows($result5);
	if($numm!=0 && $rows5['status'] == 0 ){
	
	 $list.="<td class='bg-purple'><span class='glyphicon glyphicon-ok-circle'></span> ".$rows5['Sub_date']."</td>";
	 }
	 else if($numm!=0)
	 {
	$list.="<td class='bg-success'><span class='glyphicon glyphicon-ok-sign'></span> ".$rows5['Sub_date']."</td>";
	 }
	 else if($numm==0 && $rows2['End_date'] >= date('Y-m-d')){
	// echo $rows2['End_date'].">=".date('Y-m-d')."<br>";
	 $today=date('Y-m-d');
	 $t=date_create($today);
	 $End_date=$rows2['End_date'];
	$t2=date_create($End_date);
	//echo $End_date.">=".$today."<br>";
	$intt=date_diff($t,$t2);
	 $list.="<td class='bg-warning'><span class='glyphicon glyphicon-minus-sign'></span> ".$intt->format('%R %a days')."</td>";
	 }
	 else if($numm==0 && $rows2['End_date'] < date('Y-m-d')){
	$today=date('Y-m-d');
	$t=date_create($today);
	$End_date=$rows2['End_date'];
	//echo $End_date."<".$today."<br>";
	$t2=date_create($End_date);
	$intt=date_diff($t,$t2);
	$list.="<td class='bg-danger'><span class='glyphicon glyphicon-remove-sign'></span> ".$intt->format('%R %a days')."</td>";
	}
	}
	 $list.="</tr>";
	 }
	 $temp=1;
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
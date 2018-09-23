<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Subid = $_GET['Subid'];
include("../common/header.php");
include("../connection/connect.php");

?>
<div class="col-sm-8">
<h3>Experiment Listing</h3>
<hr color="#d5d5d5">
<div class="alert alert-info alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-lable="close"><span class="glyphicon glyphicon-remove-circle"></span></a><strong>Click on field to edit</strong></div>
 <center>
<table class="table table-striped">
<?php
   $sql="select * from experiment WHERE Subid=".$Subid;
  $result=mysqli_query($conn,$sql) or die("could not execute query1");
  $numrows= mysqli_num_rows($result);
 if($numrows==0)
{
echo "<tr class='warning'><td><b><center><br><br><br><br>No Experiment Present.</center></b></td></tr>";
}
 
	$list="<thead>";
	$list="<tr class='success'>";
	$list.="<th><span class='glyphicon glyphicon-pushpin'></span> Expid</th>";
	$list.="<th><span class='glyphicon glyphicon-folder-open'></span> Experiment</th>";
	$list.="<th><span class='glyphicon glyphicon-tasks'></span> Title</th>";
	$list.="<th><span class='glyphicon glyphicon-calendar'></span> Start date</th>"; 
	$list.="<th><span class='glyphicon glyphicon-calendar'></span> End date</th>";
	$list.="<th><span class='glyphicon glyphicon-pencil'></span> Documents</th>";	

  $list.="</tr>";
  $list.="</thead>";
    $list.="<tbody>";
	
  while($rows=mysqli_fetch_assoc($result))
   {
     $list.="<tr>";
     $list.="<td>".$rows['Expid']."</td>"; 
	 $list.="<td>".$rows['Expno']."</td>"; 
     $list.="<td><span class= 'xedit' id='".$rows['Expid']."' id2='Title'>".$rows['Title']."</td>";
     $list.="<td><span class= 'xedit' id='".$rows['Expid']."' id2='Start_date'>".$rows['Start_date']."</td>";
	 $list.="<td><span class= 'xedit' id='".$rows['Expid']."' id2='End_date'>".$rows['End_date']."</td>";
	 
	 $query7 = "SELECT * FROM upload WHERE expid =".$rows['Expid'];
	$result7 = mysqli_query($conn,$query7) or die('Error, query failed');
	$count= mysqli_num_rows($result7);
	$list.="<td>";
	if($count != 0){
	 $list.="<button type='button' class='btn btn-primary btn-sm glyphicon glyphicon-download' onclick=javascript:window.location.href='download.php?id=".$rows['Expid']."'> Download</button>";
	}
	else
	{
		$list.="<i>No file available</i>";
	}
	$list.="</td>";
	 $list.="</tr>";
   }
   $list.="</tbody>";      
   $list.="</table>";
   echo($list); 
?>

</center>
 
 <!--Editable-->
 		<script src="../js/jquery.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-editable.js" type="text/javascript"></script> 
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var xx = $(this).closest('td').children('span').attr('id2');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "process.php?Expid="+x+"&data="+y+"&field="+xx,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error Processing your Request!');}
				},
				error: function(e){
					alert('Error Processing your Request!!');
				}
			});
		});
});
</script>
 <!--End Editable-->
 
 </div>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>
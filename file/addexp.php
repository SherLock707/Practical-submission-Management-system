<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Subid = $_GET['Subid'];
$Tid = $_SESSION['Tid'];
include("../common/header.php");

?>
    <div class="col-sm-8">
	<h3>Add Experiment</h3>
<hr color="#d5d5d5">
    <div class="col-sm-5">
  <form role="form" method="POST" action="addexpcontrol.php" enctype="multipart/form-data" style="margin-left: 210px; margin-right: -247px;">
      <label><span class='glyphicon glyphicon-pushpin'></span> Exp no:</label>
      <input type="number" class="form-control" size="4" name="Expno" placeholder="1" required>
	  
	  <label><span class='glyphicon glyphicon-tasks'></span> Title:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="Title" required>
	 
	  <label><span class='glyphicon glyphicon-calendar'></span> Start Date:</label>
      <input type="date" class="form-control" size="10" name="Start" placeholder="2017/04/22" required>
	  
	  <label><span class='glyphicon glyphicon-calendar'></span> End Date:</label>
      <input type="date" class="form-control" size="10" name="End" placeholder="2017/04/30" required>
	  
	<label><span class='glyphicon glyphicon-pencil'></span> File upload:</label>
    <!--<input type="textarea" class="form-control" row="5" name="Description" placeholder="study of Select,delete query">-->
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
	<input name="userfile" type="file" id="userfile">
	  <?php
	  echo"<input type='hidden' name='Tid' class='form-control' value='".$Tid."'>";
	  echo"<input type='hidden' name='Subid' class='form-control' value='".$Subid."'>"	 
	  ?> 
	  <br>
        <button name="Submit" class="btn btn-md btn-success btn-block glyphicon glyphicon-plus" type="submit" id="upload" value="Upload"> <strong>Add</strong></button>
	  
  </form>
  </div>
    </div>
<?php
include("../common/footer.php");
?>
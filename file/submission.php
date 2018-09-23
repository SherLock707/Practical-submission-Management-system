<?php
	session_start();
	if(!isset($_SESSION['Tid'])){
	header('Location: login.php', true);
	}
$Tid = $_SESSION['Tid'];
include("../common/header.php");
?>
    <div class="col-sm-8">
	<h3>Experiment Listing</h3>
<hr color="#d5d5d5">
    <div class="col-sm-5">
  <form role="form" method="POST" action="addexpcontrol.php">
      <label>Exp no:</label>
      <input type="number" class="form-control" size="4" name="Expno" placeholder="1" required>
	  
	  <label>Title:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="Title" required>
	 
	  <?php
	  echo"<input type='hidden' name='Tid' class='form-control' value='".$Tid."'>";
	  echo"<input type='hidden' name='Subid' class='form-control' value='".$Subid."'>"	 
	  ?> 
	  <br>
        <button name="Submit" id="submit" class="btn btn-md btn-success btn-block glyphicon glyphicon-save-file" type="submit"> <strong>Add</strong></button>
	  
  </form>
  </div>
    </div>
<?php
include("../common/footer.php");
?>
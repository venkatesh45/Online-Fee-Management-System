<?php
	include('db.php');
	$var1=$_GET['val1'];
	$sql="SELECT file FROM student where id='$var1'";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);
	header("Content-type: image/jpg");
	echo $row['file'];
	
?>

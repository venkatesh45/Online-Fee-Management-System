<?php
		include('db.php');
		////////////////////////////////////////for creating table (main) to check with the register contents/////////////////////////////////
	/*$var="CREATE TABLE details(name CHAR(20), id VARCHAR(10), department CHAR(5))";
	if(mysqli_query($link,$var))
	{
		echo "created";
		}
	else
		echo "not created".mysqli_error($link);*/
	$var="INSERT INTO details (name,id,department) VALUES ('$_POST[name]','$_POST[rollid]','$_POST[department]')";
	mysqli_query($link,$var);
?>
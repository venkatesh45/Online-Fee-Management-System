<?php
	include('db.php');
	$n1=$_POST['username'];
	$n2=$_POST['id'];
	$n3=$_POST['password'];
	$n4=$_POST['conpassword'];
	$n5=$_POST['fathername'];
	$n6=$_POST['dept'];
	$n7=$_POST['year'];
	$n8=$_POST['date'];
	$n9=$_POST['contactno'];
	$n10=$_POST['email'];
	$n11=$_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"pictures/".$_FILES["file"]["name"]);
	
	/*////////////////////////////
	checking with test*///////////////////////////
	
	$var=mysqli_query($link,"SELECT * FROM details WHERE id='$n2'");
	if(mysqli_num_rows($var))
	{
		echo "present in database";
		/*$var1="CREATE TABLE student (username CHAR(20),id VARCHAR(10),fathername CHAR(20), dept CHAR(5), year INT,date date, contactno INT, email VARCHAR(20), file INTEGER)";
		if(mysqli_query($link,$var1))
		{
			echo "creaed table student";
			}
		else
		{
			echo "not able to create table".mysqli_error($link);
			}*/
	
		$var1="INSERT INTO `student`(`username`, `id`,`password`,`conpassword`, `fathername`, `dept`, `year`, `date`, `contactno`, `email`, `file`) VALUES ('$n1','$n2','$n3','$n4','$n5','$n6','$n7','$n8','$n9','$n10','$n11')";
		mysqli_query($link,$var1);
		
		/*if(mysqli_query($link,$var1))
		{
			echo "inserted";
			
			}
		else
		{
			echo "not inserted".mysqli_error($link);
			}*/
			header('Location: /Online%20Exam%20FEE/index.html');
	}
	else
	{
		echo "not in database";
		echo "u r not a student of griet";
		
	}
?>
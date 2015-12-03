<?php
	include('db.php');
	$n1=$_POST['username'];
	$n2=$_POST['password'];
	$var="SELECT * FROM student WHERE id='$n1'";
	$var1=mysqli_query($link,$var);
	$var2=mysqli_query($link,"SELECT password FROM student WHERE id='$n1'");
	$row=mysqli_fetch_array($var2);
	/*echo $row['password'];*/
	/*while($row=mysqli_fetch_array($var2))
	{
		/*echo $row['password'];*/
		/*}*/
	if(mysqli_fetch_array($var1))
	{
		/*echo "present";*/
		if($row['password']==$n2)
		{
			/*echo "password matched";*/
			header('Location:/Online%20Exam%20FEE/page1.php?val='.$n1);
			}
		else
		{
			echo "password not matched";
			}
	}
	else
	{
		echo "should register".mysqli_error($link);
	}
?>
<?php
	/*//creating connection
	
	$con=mysqli_connect("","","","student");
	//checking the connection
	if(mysqli_connect_errno())
	{
		echo "Failed to connect the MySQL" . mysql_connect_error();
		}*/
		
		
		//creating connection
		
		$link=mysqli_connect('','','','student1');
		
		//checking the connection
		if(!$link)
		{
			echo "can't connect to mysql";
			
		}
		else
		{
			echo "connected successfully";
		}
		
		/*
		//creating the database
		$sql="CREATE DATABASE student1";
		if(mysqli_query($link,$sql))
		{
			echo "database created successfully";
		}
		else
		{
			echo "database not created".mysqli_error($link);	
		}
		*/
		
			
?>
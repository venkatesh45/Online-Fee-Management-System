<html>
<form action="uploadphoto.php" method="post">
<input type="file" name="image" value="upload"/>
<input type="submit" name="submit"/>
</form>
</html>
<?php
	include('db.php');
	if(isset($_POST["submit"]))
	{
		
		$imagename=mysqli_real_escape_string($link,$_FILES["image"]["name"]);
		$imagedata=mysqli_real_escape_string($link,file_get_contents($_FILES["image"]["tmp_name"]));
		echo $imagedata;
	}
?>
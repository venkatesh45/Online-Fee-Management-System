<?php
	include 'db.php';
		$year1=$_GET['y'];
		$sem1=$_GET['sem'];
		$var1=$_GET['var1'];
	$numberresult1=mysqli_query($link,"SELECT * FROM examresults WHERE id='$var1' and year=$year1 and sem=$sem1 and result='F'");
	$number1=mysqli_num_rows($numberresult1);
	echo '<table bordercolor="#CCCCCC"  border="thin" id="tab">
			<thead>
				<tr>
						<th>Subject Code</th>
							<th>Subject</th>
							<th>Internal Marks</th>
							<th>External marks</th>
							<th>Total Marks</th>
							<th>Result</th>
							<th>Select</th>
						</tr>
					</thead>';
					
					
						for($i=0;$i<$number1;$i++)
						{
							$row1=mysqli_fetch_row($numberresult1);
							echo '<tr>
								<td>'.$row1[1].'</td>
								<td>'.$row1[2].'</td>
								<td>'.$row1[3].'</td>
								<td>'.$row1[4].'</td>
								<td>'.$row1[8].'</td>
								<td>'.$row1[5].'</td>
								<td>
								<input type="checkbox" name="select" onclick="storeresult(this)"/>
								</td>
								</tr>';
							}
							
						echo '<div id="loginbutton">
							<input type="button" href="" style="color:#707070" onclick="showresult()" value="PAY" name="btn">
							</div>';		
?>
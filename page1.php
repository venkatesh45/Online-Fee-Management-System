<html>
	<head>
		<title>Online Exam fee payment</title>
		<link href="css/1.css" type="text/css" rel="stylesheet"/> 
        <script src="js/jquery-2.1.0.js" type="text/javascript" language="javascript"></script>
        <script src="js/1.js" type="text/javascript" language="javascript"></script>
		<script>
				var subarr=new Array();
				var first;
				function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

				 function gettable()
				 {
					
					$.fn.serializeObject = function serializeObject() {
						var o = {};
						var a = this.serializeArray();
						$.each(a, function () {
							if (o[this.name] !== undefined) {
								if (!o[this.name].push) {
									o[this.name] = [o[this.name]];
								}
								o[this.name].push(this.value || '');
							} else {
								o[this.name] = this.value || '';
							}
						});
						return o;
					};
					var obj=$("#form1").serialize();
					var finalobj=$("#form1").serializeObject();
					first = getUrlVars()["val"];
					$.ajax({
						
						url: 'gettable.php?y='+finalobj.year+'&sem='+finalobj.sem1+'&var1='+first,
						type: 'POST',
						data:obj,
						contentType: 'application/json',
						success: function (response) {
								$('#back').append(response);
						},
						error: function () {
							alert("error");
						}
					});
				}
				function storeresult(checkobj)
				{
					if(checkobj.checked==true)
					{
						//alert(checkobj.parentNode.parentNode.cells[0].innerHTML);
						subarr.push(checkobj.parentNode.parentNode.cells[0].innerHTML);
					}
					else
					{
						subarr.pop(checkobj.parentNode.parentNode.cells[0].innerHTML);
					}
				}
				function showresult()
				{
					
					var jsonString = JSON.stringify(subarr);
					//alert(jsonString);
					window.location.href="hallticket.php?js="+jsonString+"&id="+first;
					// $.ajax({
						// url: 'hallticket.php',
						// type: 'POST',
						// data:{"data1":jsonString},
						// contentType: 'application/json',
						// success: function (response) {
							// alert(response);
						// },
						// error: function () {
							// alert("error");
						// }
					// });
				}
		</script>
	</head>
    <body>
		<!--------------------------------------header--------------------------------->
    	<header>
        	<div id="logo" class="heading1">
        		<img src="images/s.gif"/>
            </div>
			<div class="heading1" id="heading">
				
			</div>
			<div class="heading1" id="online">
				<span style="font-family:andalus
                ; color:#C63; font-size:42px">ONLINE EXAMINATION FEE MANAGEMENT SYSTEM</span>
               
			
		</header><!--------------------------------------------------------------------------->
		<!--<div id="roll"></div>-->
		<!---------------------------------------------container--------------------->
		<div id="container">
        <?php
		   include('db.php');
		   $var1=$_GET['val'];
		   $username = mysqli_query($link,"SELECT * FROM student WHERE id='$var1'");
		   $row=mysqli_fetch_row($username);
		   ?>
        	         <img src="pictures/<?php
						echo $row[10];
					 ?>" style="float:right; padding:1% 1% 0 0" height="150px" width="150px"/>
                     	
           <div id=content>
			<label>Name of the student :
			
            <?php
		   echo $row[0];
		   
		   ?>
            
			
			</label><br><br>
         
            <label>Father's name : 
            
            <?php
				echo $row[4];
			?>
            
            
            </label><br><br>
            <label>Roll Number : 
            
            <?php
				echo $row[1]
			?>
            
            </label><br><br>
            <label>Date Of Birth : 
            <?php
				echo $row[7];
			?>
            
            </label><br><br>
            <label>Pay Fees :</label>
            <input type="radio" name="exam" id="regular"/><label>Regular</label>
            <input type="radio" name="exam" id="backlog"/><label>Backlogs</label>
            <div class="regularshow" id="regularshow">
            	<label>Year :&nbsp;</label><select class="inputs" style="width:7%; margin-right:4%">
                	<option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3" selected>III</option>
                    <option value="4">IV</option>
                </select>
                <label>Semester :</label>
                <input type="radio" name="sem"/>I
                <input type="radio" name="sem"/>II
                <div id="loginbutton" onclick="feereceipt.php">
					<a href="feereceipt.php?val=<?php echo $var1; ?>" style="color:#707070">PAY</a>
				</div>
            
            
            </div>
            <div class="regularshow" id="backlogsshow">
            <label>Number of backlogs : </label>
            
            <input type="text" name="backlogs" style="width:5%" class="inputs" value="<?php
			$numberresult=mysqli_query($link,"SELECT * FROM examresults WHERE id='$var1' and result='F'");
			$number=mysqli_num_rows($numberresult);
			echo $number;
				
			?>"/><br>
            <label>Year :</label>
            <form method="post" name="form1"  id="form1">
            <select name="year" id="year">
            	<option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <input type="radio" name="sem1" id="sem1" value="1"/>I
            <input type="radio" name="sem1" value="2" id="sem1"/>II
            <input type="button" name="show" value="show" id="show" style="margin-left:2%" onclick="gettable()"/>
            </form>
            </div>
            <!--list of backlogs-->
        	<div id="back">
				
            
            	
				 <!--<div id="loginbutton">
                	
					 <a href="" style="color:#707070">PAY</a>
					
				 </div>-->
            </div>
			
			</div>
		
		</div>
		<!-------------------------------------------------------------------------->
		<!-------------------------------------footer-------------------------------
		<footer>
        	
		</footer>
		<!------------------------------------------------------------------------->
    </body>
</html>
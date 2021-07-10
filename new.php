<?php

include "database.php";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> Sanofar</title>
		<link rel="stylesheet"
		      type="text/css"
		      href="css/style.css">
	</head>
		<body>
			<div id="container">
				<div id="header">
					<h1>LIBRARY</h1>
				</div>
				<div id="wrapper">
					<h3 id="heading"> New User Registration</h3>
					<div id="center">
					<?php
					if(isset($_POST["submit"]))
					{
					
							$sql="insert into student(NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
							$db->query($sql);
							echo "<p class='success'>Registered</p>";
						
						
					}
					?>
					     <form action="<?php echo $_SERVER["PHP_SELF"];?>"method="post" >
						     <label>Name</label>
							 <input type="text" name ="name" required>
							 <label>Password</label>
							 <input type="password" name="pass" required>
							 <label> Email ID</label>
							 <input type="email" name="mail" required>
							 <select name="dep">
							     <option value="">Department</option>
							     <option value="EEE">EEE</option>
								 <option value="ECE">ECE</option>
								 <option value="CSE">CSE</option>
								 <option value="CSE">MECH</option>
								 <option value="OTHERS">Others</option>
								 
							</select>
							 <button type="submit" name="submit">Register Now</button>
						 </form>
					</div>
					
	
					</div>
					<div id="navi">
				<?php
				    include "sidebar.php";
				?>
					</div>
					<div id="footer">
						<p>Copyright &copy; Sanofar Jahan 2021 </p>
					</div>
				</div>
			</body>
		</html>



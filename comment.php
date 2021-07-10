<?php
session_start();
include "database.php";
 
if(!isset( $_SESSION["ID"]))
{
	 header("location:ulogin.php");
}
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
					<h3 id="heading"> Review</h3>
					<?php
					if(isset($_POST["submit"]))
					{
					
							 $sql="insert into comment(BID, SID,COMM, LOGS) VALUES ({$_GET["id"]},{$_SESSION["ID"]}, '{$_POST["mes"]}',now()) ";
							$db->query($sql);
							echo "<p class='success'>Comment Posted</p>";
						
						
					}
					$sql= "SELECT * from BOOK where BID=".$_GET["id"];
					$res=$db->query($sql);
					if(!empty($res) && $res->num_rows>0)
					{
						echo"<table>";
						$row=$res->fetch_assoc();
						echo"
						<tr>
						     <th>Book Name</th>
							 <td>{$row["BTITLE"]}</td>
					    <tr>
						<tr>
						     <th>Keywords</th>
							 <td>{$row["KEYWORDS"]}</td>
					    <tr>
						";
						echo"</table>";
					}
					else
					{
						echo "<p class='error'> No Books Found</p>";
					}
					?>
					<div id="center">
				    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>"method="post">
					<label> Add Comments</label>
					<textarea name="mes" required></textarea>
					<button type="submit" name="submit"> Post</button>
					</form>
					   
					</div>
					<?php
					     $sql="SELECT student.NAME, comment.COMM, comment.LOGS from comment inner join student on comment.SID= student.ID where comment.BID={$_GET["id"]} order by comment.CID desc";
						 $res=$db->query($sql);
						 if($res->num_rows>0)
						 {
							 while($row=$res->fetch_assoc())
							 {
								 echo "<p>
								 <strong>{$row["NAME"]} : </strong>
									 {$row["COMM"]}
									 <i>{$row["LOGS"]}</i>
									 </p>";
							 }
						 }
						 else
						 {
							 echo"<p class='error'>No Reviews</p>";
						 }
					?>
					
	
					
	
					</div>
					<div id="navi">
				<?php
				    include "userSidebar.php";
				?>
					</div>
					<div id="footer">
						<p>Copyright &copy; Sanofar Jahan 2021 </p>
					</div>
				</div>
			</body>
		</html>



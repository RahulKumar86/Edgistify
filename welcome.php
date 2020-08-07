<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
<link rel="stylesheet" href="bootstrap.min.css">

		<script src="bootstrap.min.js"></script>
<title>Welcome Page</title>
<style>
.bb{
    border:2px double #696969;
    background-color:#696969;
    
    margin:5px 0px 0px 120px;
}
body{
			background-color:black;
			text:white;
			color:whitesmoke;
		}
</style>
</head>
<body>

<header>
<div style="float:right";>
	
    <a href="register.php">	<button type="button" class="btn btn-danger">Register</button></a>&nbsp;
    
	<a href="logout.php">	<button type="button" class="btn btn-danger">Login</button></a>&nbsp;
    <a href="welcome.php">	<button type="button" class="btn btn-success">Display</button></a> &nbsp;
    <a href="logout.php">	<button type="button" class="btn btn-danger">Logout</button></a>&nbsp;
</header>
<br><br>

<?php
$num = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$num = $_POST["number"];
}


?>
<div class="container bb">
<div class="row">
<div class="col-md-12">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Date: <input type="number" name="number" placeholder="In numbers">
<input type="submit" name="submit" value="Submit">
</form>



<a href="reset.php"><input type="button" value="reset"></a>
</div>
<div class="col-md-12">
<?php
	$con = mysqli_connect('localhost','root','','larave');//larave is name of database
    
	$query = "SELECT * from wordss where Date=$num;"; //wordcount is table name
	$run = mysqli_query($con,$query);
	$total = mysqli_num_rows($run);

	if($total != 0){

		?>

	<table class="table table-dark table-hover table-striped">
		<tr>
			<th>User</th>
			<th>Comment</th>
			<th>Date</th>
			
		</tr>
		<?php
			while($data = mysqli_fetch_assoc($run)){ //fetching data in tabular structure
				echo "<tr>
						<td>".$data['User']."</td>
						<td>".$data['Comment']."</td>
						<td>".$data['Date']."</td>
						
						
						
						
						
                       
					</tr>";

			}
		}else{
			echo "no record found";
		}
		?>
	</table>	
</div>
</div>
</div>
</body>
</html>
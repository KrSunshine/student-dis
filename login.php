<?php
if(isset($_POST['username']) and isset($_POST['password']))
	{
			$username = filter_var(trim($_POST['username']));
			$password = hash('sha256',$_POST['password']);

			$servername = "mysql.cs.nott.ac.uk";
			$dbusername = "psxra11";
			$dbpassword = "MEOWMEOWXX";
			$dbname = "psxra11";
			// Create connection
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		$sql = "SELECT * from accounts where username = '$username' and password = '$password'"; 

		if ($result = $conn->query($sql))
		{
			if($result ->num_rows > 0) {
					echo "Succesful Login";
					$row = $result->fetch_assoc();
					$studentid = $row["studentid"];
					echo $studentid;
					session_start();
					$_SESSION["studentid"] = $studentid;
					header("location: mainpage.php");
					}	
			else { 
				echo "Wrong Password or Username";  
			}
		}
		else {
			die("Query failed: " . $conn->error);
		}

		$conn->close();
	}
?>


<!DOCTYPE html>
<html>
<title>Student Log in</title>
<link href="loginstyle.css" rel="stylesheet">
  <form action="login.php" method="POST">
    <div class="imgcontainer">
        <img src="Eevee.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password">
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</html>
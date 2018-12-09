<?php
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['studentid']))
	{
			$username = filter_var(trim($_POST['username']));
			$password = hash('sha256',$_POST['password']);
            $studentid = $_POST['studentid'];
            $conpass = hash('sha256',$_POST['conpass']);

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
		$sql = "SELECT * from accounts where username = '$username'";

		if ($result = $conn->query($sql))
		{
			if($result ->num_rows > 0) {
				echo "This username already exists";
			}	
			else { 
				echo "This username is available";  
                if($password != $conpass){
                    echo "The two passwords do not match";}
                else{
                     $sql = "INSERT INTO accounts VALUES ('$studentid','$username', '$password')";

                    if ($conn->query($sql) === TRUE) {
                    echo "New user created successfully";
                    header("Location: successsignup.php");
                    }
                     else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                     } 
                }  
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
<title>Student Signup</title>
<link href="signupstyle.css" rel="stylesheet">
    <form action="signup.php" method="post">
        <div class="container">
            <label for="studentid"><b>Student ID</b></label>
            <input type="text" placeholder="Enter Student ID" name="studentid">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password">
            <label for="conpass"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="conpass">
            <button type="submit">Sign Up</button>
        </div>
    </form>
</html>


<?php
	session_start();
    $studentid = $_SESSION['studentid'];
	//echo $studentid;
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
    $sql = "SELECT `exams`.`examname`,`exams`.`examdate` 
    FROM `psxra11`.`takes`, `psxra11`.`exams`  
    where `takes`.`exid` = `exams`.`examid` 
    and `takes`.`s_id` = '$studentid';"; 

    if ($result = $conn->query($sql))
    {

    }
    else {
        die("Query failed: " . $conn->error);
    }

    $conn->close();    
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Modules</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="examstyle.css">
</head>
<body>
	<div class="container">
		<div class="nav">
			<h2><a href="mainpage.php">Menu</a></h2>
			<ul>
				<li><a href="modulepage.php">My Modules</a></li>
				<li><a href="exampage.php">My Exams</a></li>
				<li>My Info</li>
			</ul>
			<div class="misc">
				<ul>
				  <li>Help</li>
				  <li><a href = "logout.php">Log out</a></li>
				</ul>
			</div>
		</div>
		<div class="main">
			<h1>My Exams</h1>
			<?php  
                while($row = $result->fetch_assoc())
                {
                    echo "<p>";
                    echo "Exam Name: " . $row["examname"]. "Date: " .$row["examdate"];  
                    echo "</p>"; 
                } 
            ?>
		</div>
	</div>
</body>
</html>
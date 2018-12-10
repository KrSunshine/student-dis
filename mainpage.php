<?php
    session_start();
    $studentid = $_SESSION['studentid'];
    echo $studentid;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Student Space</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="mainpagestyle.css">
</head>
<body>
  <div class="container">
    <div class="nav">
  		<h2><a href="mainpage.php">Menu</a></h2>
  		<ul>
    		<li><a href="modulepage.php">My Modules</a></li>
    		<li><a href="exampage.html">My Exams</a></li>
    		<li>My Info</li>
      </ul>
      <div class="misc">
        <ul>
          <li>Help</li>
          <li>Log out</li>
        </ul>
      </div>
    </div>
    <div class="main">
        <h1>Welcome to your Student Space</h1>     
        <p>You can navigate this website by clicking the menus on the left.</p>
        <p>My modules: find a list of your modules and their information such as assessment methods and credits.</p>
        <p>My Exams: find a list of your exams and important information such as exam dates.</p>
        <p>My Info: find your personal information.</p>
    </div>
  </div>
</body>
</html>

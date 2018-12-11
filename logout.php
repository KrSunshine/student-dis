<?php
    session_destroy();
?>

<!DOCTYPE html>
<html>
<title>Log out successful</title>
    <form action="login.php" method="post">
        <div class="container">
           <h1>You have been logged out</h1>
            <button type="submit">Log in</button>
        </div>
    </form>
</html>

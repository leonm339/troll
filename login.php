<?php
    include_once 'header.php';
?>
<h1>Registration</h1>
<form action="signin.php" method="post">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username" required="required" /><br/>
    <label for="password">Password: </label>
    <input type="password" id="password" name="pass" required="required" /><br/>
    <input type="submit" value="Login" />
</form>

<?php
    include_once 'footer.php';
?>
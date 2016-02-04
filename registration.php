<?php
    include_once 'header.php';
?>
<h1>Registration</h1>
<form action="user_insert.php" method="post">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username" required="required" /><br/>
    <label for="mail">Mail: </label>
    <input type="email" id="mail" name="mail" required="required" /><br/>
    <label for="password1">Password: </label>
    <input type="password" id="password1" name="pass1" required="required" /><br/>
    <label for="password2">Password: </label>
    <input type="password" id="password2" name="pass2" required="required" /><br/>
    <input type="submit" value="Register" />
</form>

<?php
    include_once 'footer.php';
?>
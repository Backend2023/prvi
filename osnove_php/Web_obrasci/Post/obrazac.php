<?php 
$_POST['nesto']="bla bla";
?>
<p>Enter your details to login:</p>
<form action="authenticate.php" method="post"> 
    <label>Username</label> 
    <input type="text" name="username" />
    <label>Password</label> 
    <input type="password" name="password" /> 
    <input type="submit" name="pritisnuto" value="Login" /> 
</form>
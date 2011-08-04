<form action="<?php echo($fullPath); ?>/membership/login.php" name="login" id='login' method="post">
<table>
	<tr>
		<td width='70' align='right'><strong>Username</strong></td>
		<td><input type="text" name="username" id="username" /></td>
	</tr>
	<tr>
		<td align='right'><strong>Password</strong></td>
		<td><input type="password" name="password" id="password" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" id="submit" value="Login" /><strong> or <a href='<?php echo($fullPath); ?>/membership/register.php'>Register</a></strong></td>
	</tr>
</table>
<br />
</form>

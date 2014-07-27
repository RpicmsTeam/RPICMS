<form action="login_check.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td><strong>E-Mail-Adresse:</strong></td>
			<td><input type="email" name="username" required="required" placeholder="E-Mail-Adresse" maxlength="255" title="Bitte gebe eine valide Email-Adresse ein (z.b.: example@email.com)" x-moz-errormessage="Bitte gebe eine valide Email-Adresse ein (z.b.: example@email.com)" /></td>
		</tr>
		<tr>
			<td><strong>Passwort:</strong></td>
			<td><input type="password" name="password" required="required" placeholder="Passwort" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Login" /></td>
		</tr>
	</table>
</form>

<a href="register.php" title="Registrierung">Registrier dich</a>

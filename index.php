<?php include("./inc/header.inc.php"); ?>
<?php
$reg= @$_POST['reg'];
$email_1 = "";
$email_2 = "";
$pass_1 = "";
$pass_2 = "";
$g_name = "";
$date = "";
$e_check = "";
$g_check = "";
$email_1 = strip_tags(@$_POST['email_1']);
$email_2 = strip_tags(@$_POST['email_2']);
$pass_1 = strip_tags(@$_POST['pass_1']);
$pass_2 = strip_tags(@$_POST['pass_2']);
$g_name = strip_tags(@$_POST['g_name']);
$date = date("Y-m-d");

if($reg){
	if($email_1==$email_2){
		$e_check=mysql_query("SELECT email FROM users WHERE email='$email_1'");
		$check_1=mysql_num_rows($e_check);
		if($check_1==0){
			$g_check=mysql_query("SELECT g_name FROM users WHERE g_name='$g_name'");
			$check_2=mysql_num_rows($g_check);
			if($check_2==0){
				if($pass_1==$pass_2){
					if(strlen($g_name)>25){
						echo "Your gamer name is too long !! Under 25 chars pls!";
					}else
					{
						if(strlen($pass_1) > 30 || strlen($pass_1) <5){
							echo "Your password must be between 5 and 30 chars!";
						}else{
							$query=mysql_query("INSERT INTO users VALUES('','$email_1','$pass_1','$date','0','$g_name')");
							die("<h2>Welcome to LOG</h2>Login to your account now ...");
						}
					}
				}else{
					echo "Your passwords dont match!";
				}

			}else{
				echo "Your gamer name is taken!";
			}
		}else{
			echo "Your email is asociated with another account!";
		}
	}else{
		echo "Your emails dont match!";
	}
}

//User login

echo $_POST["usermail"];
echo $_POST["password"];
if(isset($_POST["usermail"]) && isset($_POST["password"])){
	$usermail =$_POST["usermail"];
	$password =$_POST["password"];

	$sql = mysql_query("SELECT id FROM users WHERE email='$usermail' AND password='$password'");
	echo "it worked";
	$userCount = mysql_num_rows($sql);
	if($userCount==1){
		while($row = mysql_fetch_array($sql)){
			$id = $row["id"];
			echo "it worked";
		}
		$_SESSION["usermail"] = $usermail;
		echo "it worked";
		header("location: home.php");
		exit();
	}
	else{
		echo '<span style="color:#AFA;text-align:center;">The information is not correct !!</span>';
		
	}
}

?>
<div style='width: 1200px; margin: 0px auto 0px auto; ' >

	<table align="center">
		<tr>
			<td width="50%" valign="top">
				<h2>Login to LoG now</h2>
				<form action="#" method="POST">
					<label for="usermail">Email</label>
					<input class="in_field" type="email" name="usermail" placeholder="yourname@email.com" required>
        			<label for="password">Password</label>
        			<input class="in_field" type="password" name="password" placeholder="password" required><br>
        			<input class="in_but" id="button" type="submit" name="login" value="Login">
				</form>
			</td>
			<td width="10%" valign="top">
				<h2>OR</h2>
			</td>
			<td width="40%" valign="top">
				<h2>Register to LoG</h2>
				<form action="#" method="POST">
					<label for="email_1">Email</label>
					<input class="in_field" type="email" name="email_1" size="25" placeholder="yourname@email.com" required>
					<label for="email_2">Repeat mail</label>
					<input class="in_field" type="email" name="email_2" size="25" placeholder="yourname@email.com" required>
					<label for="pass">Password</label>
					<input class="in_field" type="password" name="pass_1" placeholder="password" required>
					<label for="pass">Repeat password</label>
					<input class="in_field" type="password" name="pass_2" placeholder="password" required>
					<label>Gamer name</label>
					<input class="in_field" type="text" name="g_name" placeholder="xXxGamerxXx" required><br>
					<input class="in_but" id="button" type="submit" name="reg" value="Register">
				</form>
			</td>
		</tr>
	</table>
	</div>
</body>

</html>
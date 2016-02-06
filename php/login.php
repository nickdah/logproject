
	<?php

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'users');
	define('DB_USER','root');
	define('DB_PASSWORD','root');

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	$ID = $_POST['usermail'];
	$Password = $_POST['password'];
	function SignIn()
	{
		session_start(); 

		if(!empty($_POST['usermail'])){
			$query = mysql_query("SELECT * FROM login where username = '$_POST[usermail]' AND password = '$_POST[password]'") or die(mysql_error());
			
			$row = mysql_fetch_array($query) or die(mysql_error());
			echo "name is ";
			echo $_POST['usermail'];
			if(!empty($row['username']) AND !empty($row['password']))
			{ 
				$_SESSION['username'] = $row['pass']; 
				echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
			}else{ 
				echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
			}
		}

	}

	if(1)
	{

		echo "Login started ...";
		SignIn();
	}

	?>


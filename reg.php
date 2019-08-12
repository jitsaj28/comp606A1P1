<?php
	session_start();
	require_once('dbconnection.php');
?>

<html>
<head>
	<h2 align ="center">New User? then Sign-UP</h2>
</head>

	
	
	<form  action="reg.php" method="post">
		
		<table align="center">
			<tr>
				<td>First Name</td>
				<td><input type="text" class="input" name="f_name" ></td>
				<td>Surname Name</td>
				<td><input type="text" class="input" name="l_name" ></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td><input type="text" class="input" name="email" ></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" class="input" name="pass1" ></td>
			</tr>

			<tr>
				<td>Re-type Password</td>
				<td><input type="password" class="input" name="pass2"></td>
			</tr>

			<tr>
				<td></td>
				<td><button type="submit" name="registration" class="sign-up_btn" >Sign Up</button>
				<a href="logIn.php">Log-In Instead</a>
			</tr>

		</table>
				
				
				
			
	</form>
	<?php
		/*if(isset($_POST['login']))
		{			
			header('Location: logIn.php');
		}*/
	
		
		
		if(isset($_POST['registration']))
			{	@$f_name = $_POST['f_name']; 
				@$l_name = $_POST['l_name'];
				@$email=$_POST['email'];
				@$pass1=$_POST['pass1'];
				@$pass2=$_POST['pass2'];
				
				 

				if($pass1==$pass2)
				{
					$query = "select * from reg_user where email='$email'";
					$query_run = mysqli_query($db,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are already registered. Try to create with another e-mail ID!")</script>';
						}
						else
						{	 $encrypt = base64_encode($pass1);//Password Encrypt
							$query1 = "insert into reg_user values('$f_name','$l_name','$email','$encrypt')";
							
							$query_run = mysqli_query($db,$query1,);
						
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['email']  =  $email;
								$_SESSION['f_name'] = $f_name;
								$_SESSION['l_name'] = $l_name;
								
								header( "Location: newUser.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>

		
</body>
</html>
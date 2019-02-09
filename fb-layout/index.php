<?php
	require "mysql/config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<title></title>
</head>
<body>
	<div class="header">
		<div class="logo"></div>
		<form action="" method="post">
			<ul>
				<li><label for="mail">Email or Phone</label><br>
				<input name="mail" type="text" class="box" id="mail" required></li>
				<li><label for="pass">Password</label><br>
				<input name="password" type="Password" class="box" id="pass" required>
				<button name="login" type="submit" class="login">Log In</button><br>
				<a href="">Forgotten account?</a></li>
				
			</ul>
		</form>
		<?php
			if(isset($_POST['login'])){
				$email=$_POST['mail'];
				$pas=$_POST['password'];

				$query="select *FROM user WHERE email='$email' AND password='$pas'";
				$query_run=mysqli_query($connect,$query);

				if(mysqli_num_rows($query_run)>0){
					session_start();

					$row=mysqli_fetch_array($query_run);
					$_SESSION['firstname']=$row['Firstname'];
					header('Location: home.php');
				}
				else{
					echo '<script type="text/javascript"> alert("Invalid email id or password")</script>';
				}
			}
		?>
	</div>
	<div class="grad">
		<div class="leftcontent">
			<p>Facebook helps you connect and share with the<br>people in your life</p>
			<div class="worldimg"></div>
		</div>
		<div class="rightcontent">
			
			<h1>Create an account</h1>
			<p class="free">It's free and always will be.</p>
			<form action="" method="post">
				<input name="fn" type="text" name="" class="name" placeholder="First name" required>
				<input name ="ln" type="text" name="" class="name" placeholder="Surname" required><br>
				<input name="email" type="text" name="" class="name1" placeholder="Mobile number or email address" required><br>
				<input name="pass" type="text" name="" class="name1" placeholder="New password" required>
				<p class="bday" required>Birthday</p>
				<select name="day" class="day">
					<option>Day</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
					<option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>
					<option>30</option>
					<option>31</option>
				</select>
				<select name="month" class="Month" required>
					<option>Month</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>Jul</option>
					<option>Aug</option>
					<option>Sept</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
				</select>
				<select name="year" class="year" required>
					<option>Year</option>
					<option>2018</option>
					<option>2017</option>
					<option>2016</option>
					<option>2015</option>
					<option>2014</option>
					<option>2013</option>
					<option>2012</option>
					<option>2011</option>
					<option>2010</option>
					<option>2009</option>
					<option>2008</option>
					<option>2007</option>
					<option>2006</option>
					<option>2005</option>
					<option>2004</option>
					<option>2003</option>
					<option>2002</option>
					<option>2001</option>
					<option>2000</option>
					<option>1999</option>
					<option>1998</option>
					<option>1997</option>
					<option>1996</option>
					<option>1995</option>
					<option>1994</option>
					<option>1993</option>
					<option>1992</option>
					<option>1991</option>
					<option>1990</option>
				</select>
				<a href="">Why do I need to provide my date of birth?</a>
				<br><input type="radio" required name="sex" id="sex"><label for="sex">Female</label>
				<input type="radio" name="sex" required id="sex"><label for="sex">Male</label><br>
				<p class="text">By clicking Sign Up, you agree to our <a href="">Terms</a>, <a href="">Data Policy</a> and<br> <a href="">Cookies Policy</a>. You may receive SMS notifications from us and<br> can opt out at any time.</p><br>
				<button name="reg" text="submit" class="signup">Sign Up</button><br>  
				<p class="page"><a href="" class="create">Create a Page</a> a for a celebrity, band or business.</p>

			</form>
			<?php
				if(isset($_POST['reg']))
				{
					$first=$_POST['fn'];
					$last=$_POST['ln'];
					$pass=$_POST['pass'];
					$em=$_POST['email'];
					$d=$_POST['day'];
					$m=$_POST['month'];
					$y=$_POST['year'];

					if(filter_var($em,FILTER_VALIDATE_EMAIL)){
						$query="select *FROM user WHERE email='$em'";
						$query_run=mysqli_query($connect,$query);

						if(mysqli_num_rows($query_run)>0){
							echo '<script type="text/javascript"> alert("Email id already registered!") </script>';
						}
						else{
							mail("theniteshgupta@gmail.com","Don't Reply","hi sexy","from: jfhfgfc");
							$query="INSERT into user value('$em','$first','$last','$pass','$d','$m','$y')";
							$query_run=mysqli_query($connect,$query);
							if($query_run==true){
								echo '<script type="text/javascript"> alert("You have sucessfully registered.") </script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Something gone wrong!") </script>';
							}
						}
					}
					else{
						echo '<script type="text/javascript"> alert("Invalid Email") </script>';
					}
				}

			?>

		</div>
	</div>
</body>
</html>
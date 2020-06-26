<?php
session_start();
kiemtradangnhap();

function kiemtradangnhap()
{
	if(isset($_POST['loginBtn']))
	{
		
		$user=$_POST['txtuser'];
		$password=$_POST['txtpass'];
		if($user==''||$password==''){
			header("location: login.php?error=empty");
			echo "<script>alert('Username or Password is empty. Please fill in the blanks');</script>";

			exit;
		}
		include('../connect.php');
		$sql="SELECT username, password FROM admin_account WHERE username='$user'";
		$class=new Database();
		$sq=$class->connect();
		$query=mysqli_query($sq,$sql);
		if(mysqli_num_rows($query)==0){
			header("location: login.php?error=notExist"); 
			echo "<script>alert('Username does not exist, please check again');</script>";
			
			exit;
		}
		
		$row=mysqli_fetch_array($query);
		
		if($password != $row[1])
		{	
			header("location: login.php?error=wrongPass"); 
			echo "<script>alert('Wrong password. Please enter again.');</script>";
			 
			exit;
		}

		$_SESSION['useradmin']=$user;
		header("location: index.php");
	}
}
?>	

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Admin Login</div>
				<div class="panel-body">
					<form action="" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="txtuser" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="txtpass" type="password">
							</div>
							<input type="submit" name="loginBtn" class="btn btn-primary" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>	
	<?php 
		if(isset($_GET['error']))
		{
		if($_GET['error'] == "empty")
		echo "<script> alert('Username or Password is Empty'); </script>";
		else if($_GET['error'] == "notExist")
		echo "<script> alert('Username does not exist, please check again'); </script>";
		else if($_GET['error'] == "wrongPass")
		echo "<script> alert('Wrong password. Please enter again.'); </script>";
		}
	?>
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>

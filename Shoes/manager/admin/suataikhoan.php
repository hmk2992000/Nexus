<head>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script>
		//username: /^[a-zA-Z\d\s]+$/ username chấp nhận chữ cái và số, không khoảng trắng, không kí tự đặc biệt
		//email: /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/
		//tel: /^\d{10,12}$/
		//address: /^[#./,\w\s-]+$/ đúng với trường hợp không có dấu
		//address: /^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/
		//password: /^[\w]{8,20}/ 
		//password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/ mật khẩu chứ ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20
		function checkUsername()
		{
			var username = document.getElementById("iduser").value;
			var patt = /^[a-zA-Z\d]+$/;
			result = patt.test(username);
			if(result == false)
			{
				document.getElementById("invalid-username").innerHTML="*Valid username without spaces, special characters";
				document.getElementById("invalid-username").style.visibility="visible";
			}
			else
			document.getElementById("invalid-username").style.visibility="hidden";

		}

		function checkPass1()
		{
			var pass1 = document.getElementById("idpass").value;
			var patt =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/;
			var result =  patt.test(pass1);
			if(result == false)
			{
				document.getElementById("invalid-pass").innerHTML="*  Password contains at least 1 lowercase letter, 1 INHOA character, at least 1 number at least 8, at most 20";
				document.getElementById("invalid-pass").style.visibility="visible";
			}
			else
				document.getElementById("invalid-pass").style.visibility="hidden";

		}

		function checkPassAgain()
		{
			var pass1 = document.getElementById("idpass");
			var pass2 = document.getElementById("idpass2");
			if(pass1.value == "")
			{
				alert("Password not entered");   
				pass1.focus(); 
				pass2.value="";  
			}
			else
			{
				if(pass2.value === pass1.value)
				{
					document.getElementById("invalid-pass2").style.visibility="hidden";
				}
				else
				{
					document.getElementById("invalid-pass2").innerHTML="* Retype password is incorrect";
					document.getElementById("invalid-pass2").style.visibility="visible";
				}
			}    
		}

		function checkEmail()
		{
			var email = document.getElementById("idemail").value;
			var patt= /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/;
			var result = patt.test(email);
			if(result == false)
			{
				document.getElementById("invalid-email").innerHTML="*  Invalid email";
				document.getElementById("invalid-email").style.visibility="visible";
			}
			else
				document.getElementById("invalid-email").style.visibility="hidden";
		}

		function xulysubmitsuataikhoan()
		{
			var username = document.getElementById("iduser");
			var pass1 = document.getElementById("idpass");
			var pass2 = document.getElementById("idpass2");
			var email = document.getElementById("idemail");
			var accept = document.getElementById("xacnhan");

			if(pass1.value == "")
			{
				alert("Empty Password !!!");
				pass1.focus();
				return false;
			}

			if(email.value == "")
			{
				alert("Empty Email !!!");
				email.focus();
				return false;
			}
			return true;
		}
		
		$(document).ready(function() {
			$("#btnsuataikhoan").click(function(){
				if(xulysubmitsuataikhoan()==true){
				$.ajax({
						type:"POST",
						url: "xulysuataikhoan.php",
						dataType: 'html',
						data:{
							username:$("#iduser").val(),
							email:$("#idemail").val(),
							password:$("#idpass").val()
						},
						success: function(data){
							alert(data);
							location.reload();
						}
					})
				}
			});
		});
	</script>
</head>

<body>
		<?php
			if(isset($_POST['username']))
			{
				$username=$_POST['username'];
				include('../connect.php');
				$class=new Database();
				$sqd=$class->connect();
				$sql="SELECT * FROM customer_account WHERE username='$username'";
				$datal=$class->query($sql);
				foreach($datal as $key=>$value)
				{
					$user=$value['username'];
					$email=$value['email'];
					$password=$value['password'];
				}
			}
		?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update Account</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
								<div class="form-group" id="user">
									<label for="exampleInputEmail1" >Username</label>
									<input type="text" id="iduser" readonly=""  class="form-control"  name="phone" value="<?php echo $user;?>">
									
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" id="idpass" name="password" value="<?php echo $password;?>" onchange="checkPass1()">
									<div id="invalid-pass" style="color:red; visibility:hidden;"></div>
								</div>
							</div>
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Email" id="idemail" name="email" value="<?php echo $email;?>" onchange="checkEmail()">
									<div id="invalid-email" style="color:red; visibility:hidden;"></div>
								</div>
								<button id="btnsuataikhoan" value="nut" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>

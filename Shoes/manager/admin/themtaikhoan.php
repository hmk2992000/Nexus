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
				document.getElementById("invalid-pass").innerHTML="* Password contains at least 1 lowercase letter, 1 uppercase character, at least 1 number at least 8, at most 20";
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
				alert("Empty password");   
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
				document.getElementById("invalid-email").innerHTML="* Wrong Email";
				document.getElementById("invalid-email").style.visibility="visible";
			}
			else
				document.getElementById("invalid-email").style.visibility="hidden";
		}


		function xulysubmitthemtaikhoan()
		{
			var username = document.getElementById("iduser");
			var pass1 = document.getElementById("idpass");
			var pass2 = document.getElementById("idpass2");
			var email = document.getElementById("idemail");
			var accept = document.getElementById("xacnhan");

			if(username.value == "")
			{
				alert("Empty Username !!!");
				username.focus();
				return false;
			}

			if(pass1.value == "")
			{
				alert("Empty password !!!");
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
		
		function reset(){
			document.getElementById("iduser").value="";
			document.getElementById("idpass").value="";
			document.getElementById("idemail").value="";
		}

		$(document).ready(function() {
			$("#btnsubmitthemtaikhoan").click(function(){
				if(xulysubmitthemtaikhoan()==true){
					$.ajax({
						type:"POST",
						url: "xulythemtaikhoan.php",
						dataType: 'html',
						data:{
							username:$("#iduser").val(),
							password:$("#idpass").val(),
							email:$("#idemail").val(),
						},
						success: function(data){
							alert(data);
							if(data!="Username already exists, please change to another account."){
								location.reload();
							}
						}

					});
				}
			});
		});
		
	</script>
</head>

<body>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Account</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" placeholder="Username" id="iduser" name="username" value="" onchange="checkUsername()">
									<div id="invalid-username" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" id="idpass" name="password" value="" onchange="checkPass1()">
									<div id="invalid-pass" style="color:red; visibility:hidden;"></div>
								</div>					
							</div>
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Email" id="idemail" name="email" value="" onchange="checkEmail()">
									<div id="invalid-email" style="color:red; visibility:hidden;"></div>
								</div>
								<button id="btnsubmitthemtaikhoan" value="nut" class="btn btn-primary">Create Account</button>
								<button type="reset" class="btn btn-default" onClick="reset()">Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>

<div class="menu-toggle"><!--Navbar Begin-->
	 <i class="fas fa-bars"></i>
</div>

<div class="overlay"></div>

<nav>
	<i class="fas fa-times"></i>
	<div class="nav-left">
		<div class="logo">
			<a href="../../index.html"><img src="./public/img/logo.png" alt="Nexus Logo"></a>
		</div>
		<ul>
			<li><a href="./home/showDefault" id="home">Home</a></li>
			<li><a href="./product/showDefault" id="shop" >Shop</a></li>
			<li><a href="./blog/showDefault" id="blog" >Blogs</a></li>
		</ul>
	</div>

	<div class="nav-right">
		<ul>
			<li>
				<a class="searchBtn" onclick="openSearch()">
					<i class="fas fa-search"></i>
				</a>
			</li>
			<li id = "account">
				<?php
					
					if(isset($_SESSION['customer_username']))
					{	
						
						echo '<a class="accountBtn" onclick="openAccount()">
									<i class="fas fa-user"></i> '.$_SESSION['customer_username'].'
								</a>';
						echo '<a  id="logout">
							&nbsp Logout
								</a>';
						 
					}
					else {
						
						echo '<a  class="accountBtn" onclick="openAccount()">
									<i class="fas fa-user"></i> Account
								</a>';
						
					}
				?>
				 
			</li>
			<li>
			
				<a href="./cart/showDefault" id="cart">
					<?php
						$numberCart = 0;
						if(isset($_SESSION['cart']))
						{
							foreach ($_SESSION['cart'] as $key => $value) {
								$numberCart += 1;
							}
						}
					?>
					<i class="fas fa-shopping-cart"><span id="items-count"> 
					<?php echo $numberCart; ?>
					</span></i> Cart
				</a>
			</li>
		</ul>
	</div>
</nav>


<div id="overlay1" class="overlay1"><!--Search Begin-->
	<span class="close" onclick="closeSearch()" title="Close">&#215</span>
	<div class="overlay-content">
		<form>
			<input type="text" name="search" placeholder="Type to search" id="searchTxt" required="">
			<button type="button" id="searchBtn">
				<i class="fas fa-search"></i>
			</button>
		</form>
	</div>
</div><!--Search Finish-->


<div id="overlay2" class="overlay2"><!--Account Begin-->
	<span class="close" onclick="closeAccount()" title="Close">&#215</span>
	<div class="align">
		<img class="logo" src="./public/img/logo.svg">
		<div class="card">
			<div class="head">
				<div></div>
				<a id="login" class="selected" href="<?php echo $_SERVER['REQUEST_URI']."#login"; ?>">Login</a>
				<a id="register" href="<?php echo $_SERVER['REQUEST_URI']."#register"; ?>">Register</a>
				<div></div>
			</div>
			<div class="tabs">
				<form action = "" method ="POST">
					<div class="inputs">
						<div class="input">
							<input type="text" name="login_username" id="login_username" placeholder="Username">
							<img src="./public/img/user.svg">
						</div>
						<div class="input">
							<input type="password" name="login_password" id="login_password" placeholder="Password">
							<img src="./public/img/pass.svg">
						</div>
						
					</div>
					<button type = "button" name = "btnLogin" id="loginBtn" >Login</button>
				</form>

				<form action = "" method = "POST">
					<div class="inputs">
						<div class="input">
							<input type="email" name="register_email" id = "register_email" placeholder="Email" required>
							<img src="./public/img/mail.svg">
						</div>
						<div class="input">
							<input type="text" name="register_username" id = "register_username" placeholder="Username" required>
							<img src="./public/img/user.svg">
						</div>
						<div class="input">
							<input type="password" name="register_password" id = "register_password"  placeholder="Password" required>
							<img src="./public/img/pass.svg">
						</div>
					</div>
					<button type = "button" name = "btnRegister" id="registerBtn">Register</button>

				</form>
			</div>
		</div>
	</div>
</div><!--Account Finish-->
<!--Navbar Finish-->

<?php 
	switch ($data["page"]) {
		case 'home':
			echo '<script>document.getElementById("home").classList.add("active");</script>';
			break;
		case 'products':
			echo '<script>document.getElementById("shop").classList.add("active");</script>';
			break;
		case 'blog':
			echo '<script>document.getElementById("blog").classList.add("active");</script>';
			break;
		case 'cart':
			echo '<script>document.getElementById("cart").classList.add("active");</script>';
			break;
		
		default:
			# code...
			break;
	}
?>

<script>
$(document).ready(function(){
	//SEARCH
	$(document).on('click', '#searchBtn', function(){
		if ($('#searchTxt').val() != "") {
			var link = './product/search/' + $('#searchTxt').val();
			window.location.href = link;
		}
	})

	//REGISTER 
	function register(email, username, password) {
		$.ajax({
			url: "./public/php/register.php",
			method: "POST",
			data: {email:email, username:username, password:password},
			success: function(data) {
                if(data == true) {
                    Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: 'Register Successfully',
                    showConfirmButton: false,
                    timer: 2500
					});
					$('#account').html(
					"<a  class='accountBtn' onclick='openAccount()'> <i class='fas fa-user'></i> "+ username +"</a>"
					+"<a  id='logout'>  &nbsp Logout </a>"
					);
				}
				else {
					Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username or Email Already Exists!',
                    showConfirmButton: false,
                    timer: 2500
					});
					$('#account').html(
						"<a  class='accountBtn' onclick='openAccount()'> <i class='fas fa-user'></i> Account </a>"
					);
				}
			}
		})
	}

	function validateEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

	$(document).on('click', '#registerBtn', function(){
		var email = $('#register_email').val();
        var username = $('#register_username').val();
		var password = $('#register_password').val();

		if (email=="" || username=="" || password=="")
		{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'All fields must be filled!',
				showConfirmButton: false,
				timer: 2500
			});
		} 
		else {
			if(validateEmail(email) == false) {
				Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Invalid Email!',
				showConfirmButton: false,
				timer: 2500
			});
			}

			else register(email, username, password);
		}
	})

	// LOGIN
	function login(username, password) {
		$.ajax({
			url: "./public/php/login.php",
			method: "POST",
			data: {username:username, password:password},
			success: function(data) {
                if(data == true) {
                    Swal.fire({
						icon: 'success',
						title: 'Great!',
						text: 'Login Successfully',
						showConfirmButton: false,
						timer: 2500
						});	
					$('#account').html(
										"<a> <i class='fas fa-user'></i> "+ username +"</a><a  id='logout'> &nbsp Logout </a>"
										);
				}
				else {
					Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username or Pasword incorrect !',
                    showConfirmButton: false,
                    timer: 2500
					});
					$('#account').html(
						"<a  class='accountBtn' onclick='openAccount()'> <i class='fas fa-user'></i> Account </a>"
					);
				}
			}
		})
	}

	$(document).on('click', '#loginBtn', function(){
		 
        var username = $('#login_username').val();
		var password = $('#login_password').val();
		 
		login(username, password);
		
	})

	// LOGOUT 
	$(document).on('click', '#logout', function(){
		
		Swal.fire({
		title: 'Are you sure?',
		text: "You are going to logout",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, logout!'
		}).then((result) => {
			if (result.value) {
				$('#account').html("<a  class='accountBtn' onclick='openAccount()'> <i class='fas fa-user'></i> Account </a>");
				
				$.ajax({
				url: "./public/php/logout.php",
				method: "POST",
				data: {},
				success: function(data) {
					
					Swal.fire(
						'Logouted!',
						'You has loged out.',
						'success'
					)
				}
				});
			}
			});
	});
});
</script>
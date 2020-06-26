<?php
	include('../kiemtrasession.php');
	if(!isset($_SESSION['useradmin']))
	{
		header("location: login.php");
	}
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script>
$(document).ready(function(){
	$("#content").load("danhsachdathang.php");
	$("#lmn1").click(function(){
		$("#content").load("thongke.php");
	});
	$("#lmn2").click(function(){
		$("#content").load("danhsachsanpham.php");
	});
	$("#lmn3").click(function(){
		$("#content").load("danhsachtaikhoan.php");
	});
	$("#lmn4").click(function(){
		$("#content").load("danhsachdathang.php");
	});
	$("#lmn5").click(function(){
		$("#content").load("danhsachhoadon.php");
	});
	$("#lmn6").click(function(){
		$("#content").load("danhsachtaikhoanadmin.php");
	});
});
</script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>Nexus</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Tài khoản<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Information</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="xulydangxuat.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li id="lmn1"><a href="#"><span class="glyphicon glyphicon-stats"></span> Statistic</a></li>
			<li id="lmn2"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Product</a></li>
			<li id="lmn3"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>  Customer Account</a></li>
			<li id="lmn6"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>  Admin Account</a></li>
			<li id="lmn4"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>  Order</a></li>
			<li id="lmn5"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Bill</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div id="content">
		</div>
	</div>
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

<?php
xulythemtaikhoan();
	function xulythemtaikhoan()
	{
		if(isset($_POST['username']))
		{
			$user=$_POST['username'];
			$email=$_POST['email'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();

			$sql="SELECT username FROM admin_account WHERE username='$user'";
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo "Username already exists, please change to another username.";
				exit;
			}

			$qry="SELECT email FROM admin_account WHERE email='$email'";
			$query=mysqli_query($sq1,$qry);
			if(mysqli_num_rows($query)==1){
				echo "Email already exists, please change to another email.";
				exit;
			}

			if(isset($_POST['username']))
			{
				$data=array('username' => $_POST['username'],
							'email'=> $_POST['email'],
							'password' => $_POST['password']
							);
				$table='admin_account';
				$class->insert($table,$data);
				echo "Hello ".$_POST['username']." You have successfully registered.";
				exit;
			}	
		}
	}
?>
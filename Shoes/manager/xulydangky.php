<?php
xulythemtaikhoan();

	function xulythemtaikhoan()
	{
		if(isset($_POST['username']))
		{
			$user=$_POST['username'];
			include('connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="SELECT username FROM user WHERE username='$user'";
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo "Tên tài khoản đã tồn tại vui lòng đổi tên tài khoản khác.";
				exit;
			}
			else{
				if(isset($_POST['username']))
				{
					$data=array('username' => $_POST['username'],
								'password' => $_POST['password'],
								'phonenumber'=> $_POST['phone'],
								'name' => $_POST['name'],
								'gioitinh'=> $_POST['sex'],
								'email'=> $_POST['email'],
								'address'=> $_POST['address'],
								'created'=> date('y-m-d'),
								'position'=>$_POST['position']
								);
					$table='user';
					$class->insert($table,$data);
					echo "Bạn đã đăng ký thành công.";
					exit;
				}
			}		
		}
	}
?>
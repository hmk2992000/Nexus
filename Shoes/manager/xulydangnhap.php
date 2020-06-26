<?php
include('kiemtrasession.php');
kiemtradangnhap();
function kiemtradangnhap()
{
	if(isset($_POST['txtuser']))
	{
		
		$user=$_POST['txtuser'];
		$password=$_POST['txtpass'];
		if($user==''||$password==''){
			echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
			exit;
		}
		include('connect.php');
		$sql="SELECT username, password, position FROM user WHERE username='$user'";
		$class=new Database();
		$sq=$class->connect();
		$query=mysqli_query($sq,$sql);
		if(mysqli_num_rows($query)==0){
			echo "Tên đăng nhập không tồn tại vui lòng kiểm tra lại.";
			exit;
		}
		
		$row=mysqli_fetch_array($query);
		
		if($password != $row[1])
		{
			echo "Mật khẩu không đúng. Vui lòng nhập lại.";
			exit;
		}
		if($row['position']=='admin'){
			echo "Xin chào quản lý ".$user.". Bạn đã đăng nhập thành công.";
			$_SESSION['useradmin']=$user;
			exit;
			
		}else{
			$_SESSION['username']=$user;
			echo "Xin chào ".$user.". Bạn đã đăng nhập thành công.";
			exit;
		}
		//die;
	}
}
?>	
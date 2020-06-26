<?php
xulysuataikhoan();
function xulysuataikhoan()
{
	if(isset($_POST['username']))
	{
		$user=$_POST['username'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data=array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'email'=> $_POST['email']
			);
		$table='customer_account';
		$class->updateuser($table,$data,$user);
		echo "Update successfully ".$_POST['username'];
		exit;
	}
}
?> 
<?php
deleteuser();
	function deleteuser(){
		if(isset($_POST['user'])){
			include('../connect.php');
			$user=$_POST['user'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="DELETE FROM admin_account WHERE username='$user'";
			$s1=$sqd->query($sql);
			echo "Delete user '$user' successfully";
		}
		else{
			echo"Delete '$user' failed";
		}
	}
?>
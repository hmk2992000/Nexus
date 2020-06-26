<?php
class search{
	public function searchnameproduct($id){
		$connect = new mysqli("localhost","root","","nexus");
		mysqli_query($connect,"SET NAMES UTF8");
		$sql="SELECT name FROM product WHERE id=$id";
		$result=mysqli_query($connect,$sql);
		$data=mysqli_fetch_assoc($result);
			$name=$data['name'];
		return $name;
	}
}
?>
<?php
	class Database{
		public $host = "localhost";
		public $user = "root";
		public $pass = "";
		public $dbname = "nexus";

		public $link;
		public $error;

		public function __construct(){
		   	$this->connect();
		}
		
		public function connect(){
			try
			{
				if(($this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname)))
				{
					
					return $this->link;
				}
				else
				{
					throw new Exception('Khong the ket noi den database <br/>');
				}
			}catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}
		//----------------------------------------------------------------------------------------------------
		public function close(){
			if($this->link)
				mysqli_close($this->link);
		}
		//---------------------------------------------------------------------------------------------------
		public function getObject($table)
		{
			$sql='SELECT * FROM'.$table;
			$data=null;
			echo $sql;
			mysqli_query($this->link,"SET NAMES 'utf8'");
			if($result = mysqli_query($this->link,$sql))
			{
				while($row = mysqli_fetch_object($result))
				{
					$data[]=$row;
				}
				mysqli_free_result($result);
				return $data;
			}
			return false;
		}
		//-----------------------------------------------------------------------------------------------------
		public function query($sql='',$return=true)
		{
			mysqli_query($this->link,"SET NAMES 'utf8'");
			if($result=mysqli_query($this->link,$sql))
			{
				if($return === true){
					while($row=mysqli_fetch_array($result)){
						$data[]=$row;
					}
					mysqli_free_result($result);
					return $data;
				}
				else
				{
					return true;
				}
			}
			else
			{
				return false;	
			}
		}
		//-----------------------------------------------------------------------------------------------------------
		public function insert($table='',$data =[])
		{
			$keys='';
			$values='';
			foreach($data as $key => $value)
			{
				$keys .=','.$key;
				$values .=',"' . mysqli_real_escape_string($this->link, $value).'"';
			}
			$sql='INSERT INTO ' .$table. ' ('.trim($keys,',').') VALUES ('. trim($values,',').')';
			return mysqli_query($this->link,$sql);
		}
		
		//-----------------------------------------------------------------------------------------------------------
		public function update($table = '',$data = [], $id =[])
		{
			$content = '';
			if(is_integer($id))
				$where = 'id = '.$id;
			else if(is_array($id) && count($id)==1){
				$listKey = array_keys($id);
				$where = $listKey[0].'='.$id[$listKey[0]];
			}
			else
				die('Không thể có nhiều hơn 1 khóa chính và id truyền vào phải là số');
			foreach ($data as $key => $value) {
				$content .= ','. $key . '="' . mysqli_real_escape_string($this->conn,$value).'"';
			}
			$sql = 'UPDATE ' .$table .' SET '.trim($content,',') . ' WHERE ' . $where ;
			return mysqli_query($this->conn,$sql);
		}
		//-----------------------------------------------------------------------------------------------------------
		public function updateuser($table = '',$data = [], $user ='')
		{
			$content = '';
				$where = "username = '$user'";
			foreach ($data as $key => $value) {
				$content .= ", $key ='$value'";
			}
			$sql = 'UPDATE ' .$table .' SET '.trim($content,',') . ' WHERE ' . $where ;
			return mysqli_query($this->link,$sql);
		}
		//-----------------------------------------------------------------------------------------------------------
		public function updatecart($table = '',$data = '', $id ='')
		{
			$content = '';
				$where = 'id = '.$id;
			
			$sql = 'UPDATE ' .$table .' SET '.$data. ' WHERE ' . $where ;
			return mysqli_query($this->link,$sql);
		}
		//------------------------------------------------------------------------------------------------------------
		 public function fetchuser($table , $user )
        {
            $sql = "SELECT * FROM {$table} WHERE username = '$user' ";
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchuser " .mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }
		//-----------------------------------------------------------------------------------------------------------
		public function updateview($sql)
        {
            $result = mysqli_query($this->link,$sql)  or die ("Lỗi update view " .mysqli_error($this->link));
            return mysqli_affected_rows($this->link);

        }
		//-----------------------------------------------------------------------------------------------------------
		public function fetchID($table , $id )
        {
            $sql = "SELECT * FROM {$table} WHERE id = $id ";
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }		//------------------------------------------------------------------------------------------------------------
		public function __destruct(){
			$this->close();
		}
		
		
	}
	
?>
<?php
	class App {

		protected $controller = "home";
		protected $action = "showDefault";
		protected $params = [];

		function __construct() {
			$arr = $this->urlProcess();

			// Xử lý Controller
			if(isset($arr[0])) {
				if(file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
					$this->controller = $arr[0];
				}
			}
			
			// Hủy Controller trong $arr
			unset($arr[0]);

			require_once "./mvc/controllers/" . $this->controller . ".php";
			//Phải khởi tạo controller vì nếu ko thì $this của controller (VD: home.php) sẽ thay thành $this của app.php
			$this->controller = new $this->controller;

			// Xử lý Action
			if(isset($arr[1])) {
				//				Tên class, 			Tên hàm chức năng
				if(method_exists($this->controller, $arr[1])) {
					$this->action = $arr[1];
				}
				// Hủy Action trong $arr
				unset($arr[1]);
			}

			// Xử lý Params
			$this->params = $arr ? array_values($arr) : [];

			call_user_func_array([$this->controller, $this->action], $this->params);
		}

		function urlProcess() {
			if(isset($_GET["url"])) {
				//explode tạo mảng cắt từ dấu /
				//filter_var xóa ký tự lạ
				//trim "/" xóa / ở đầu, cuối, lặp 2 lần trở lên
				return explode("/", filter_var(trim($_GET["url"], "/")));
			}
		}
	}
?>
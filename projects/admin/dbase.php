<?php
	class Database {

		public function __construct(){
		}

		public function initConnection(){
			return mysqli_connect('localhost','root', '', 'aml_db');
		}

		public function getAccounts($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT Nname,position from employee order by id limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getTransac($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT transac_date,transac_time,transac_total from transaction where `transac_date` = CURDATE() - INTERVAL 1 DAY order by transac_time limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getlogs($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT order_time,order_served,order_date,order_waiter,order_name, order_quantity	 from order_db order by order_date limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}



		public function getCount($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT order_name, COUNT(order_name) as'counts'	 from order_db group by order_name limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getAvailability($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT name,item_category, item_availability  from menu_db order by item_category, name limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getSummary($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT time,Tno,Tbill,date from transaction order by time limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}
		public function getSummary1($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT Tbill,date from transaction order by date limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getSum($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT SUM(transac_total) AS 'total' , transac_date from transaction  where `transac_date` = CURDATE() - INTERVAL 1 DAY limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ii', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		public function getMenu($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT name,code,item_category, item_happyprice, item_regularprice  from menu_db order by item_category, name limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}
		/*
		public function getMenureg($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT name,item_category, item_regularprice  from menu_db order by item_category limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}
		*/

		public function geteditMenu($name){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT  name, item_category, item_happyprice, item_regularprice, item_availability FROM menu_db where name like ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $name); //change i to s since your searching for an email address
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

		


		public function editMenu($name){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$names = $_POST['name'];
			$item_categorys = $_POST['item_category'];
			$item_happyprices= $_POST['item_happyprice'];
            $item_regularprices = $_POST['item_regularprice'];
			$query = "UPDATE `menu_db` SET `item_category` = '$item_categorys',`item_happyprice`= '$item_happyprices', `item_regularprice`= '$item_regularprices' WHERE `name` = ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $name);
			mysqli_stmt_execute($stmt);
		}
		public function activate($name){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$names = $_POST['name'];
			$query = "UPDATE `menu_db` SET `item_availability` = 'available' WHERE `name` = ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $name);
			mysqli_stmt_execute($stmt);
		}

		public function deactivate($name){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$names = $_POST['name'];
			$query = "UPDATE `menu_db` SET `item_availability` = 'not available' WHERE `name` = ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $name);
			mysqli_stmt_execute($stmt);
		}
		public function activatehour($type){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$names = $_POST['type'];
			$query = "UPDATE `time_pass` SET `type` = 'Happy Hour' WHERE `type` = ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $type);
			mysqli_stmt_execute($stmt);
		}

		public function deactivatehour($type){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$names = $_POST['type'];
			$query = "UPDATE `time_pass` SET `type` = 'Regular Hour' WHERE `type` = ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $type);
			mysqli_stmt_execute($stmt);
		}






		public function getAvail($name){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT  name, item_category, item_availability FROM menu_db where name= ?";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt, 's', $name); //change i to s since your searching for an email address
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}

	










	}


?>
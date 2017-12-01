<?php
	class Database {

		public function __construct(){
		}

		public function initConnection(){
			return mysqli_connect('localhost','root', '', 'aml_db');
			}

			public function getMenu($start, $end){
			$conn = $this->initConnection();
			$stmt = mysqli_stmt_init($conn);
			$query = "SELECT name,item_category, item_happyprice  from menu_db order by item_category limit ?,? ";
			mysqli_stmt_prepare($stmt, $query);
			mysqli_stmt_bind_param($stmt,'ss', $start, $end);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			return $stmt;
		}
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
	}
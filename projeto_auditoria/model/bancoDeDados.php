<?php
	
	class DataGetter {
		private static $servername = "localhost";
		private static $username = "root";
		private static $password = "";
		private static $conn;

		private function __constructor(){}
		private function __clone(){}
		private function __wakeup(){}
		
		public static function getConn(){
			if (self::$conn===null){
				try {
					self::$conn = new PDO("mysql:host=localhost;dbname=projeto_auditoria", self::$username, self::$password);
					self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e){
					echo "Conexão falhou: " . $e->getMessage();
				}
			}
			return self::$conn;
		}
	}
?>

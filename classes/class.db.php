<?php




	class db {



		private static $_host = 'localhost';
		private static $_username = 'root';
		private static $_password = 'limitless';
		private static $_driver = 'mysql';
		private static $_instance = null;




		private function __construct(){

		}


		public static function prepare($i){

			return self::getInstance()->prepare($i);

		}


// 

		public static function getInstance($dbname = 'hng'){


			if(is_null(self::$_instance)){

				//Create a new internal object, then extract and return instance

				self::$_instance = self::__connect($dbname);


			}

			return self::$_instance;

		}


		public static function getResult($sql){

			return $sql->fetch(PDO::FETCH_ASSOC);

		}




		private static function __connect($dbname){


			try {

					$dsn = self::$_driver.':host='.self::$_host.';dbname='.$dbname;

					$conn = new PDO($dsn,self::$_username,self::$_password);
					$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					return $conn;

			} 	catch(PDOException $e) {

					die('Sorry. Database went to pee. It left a note saying:'.strtolower($e->getMessage()));

				}

		}





		public static function disconnect(){

			self::$_instance = null;

		}



	}




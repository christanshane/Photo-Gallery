<?php
	//if it's going to need the database, then it's
	//probably smart to require it before we start
	require_once(LIB_PATH.DS."database.php");
	
	class User{
		protected static $table_name="users";
		public $id;
		public $username;
		public $password;
		public $first_name;
		public $last_name;
	
		public function full_name(){
			if(isset($this->first_name) && isset($this->last_name)){
				return $this->first_name . " " . $this->last_name;
			}else{
				return "";
			}
		}
		
		public static function authenticate($username="", $password=""){
			global $database;
			$username = $database->escape_value($username);
			$password = $database->escape_value($password);
			
			$sql = "SELECT * FROM users ";
			$sql .= "WHERE username = '{$username}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";
			
			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}
		
		//common db methods
		public static function find_all(){
			return self::find_by_sql("SELECT * FROM".self::$table_name);
		}
		
		public static function find_by_id($id=0){
			$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id = {$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}
		
		public static function find_by_sql($sql=""){
			global $database;
			$result_set = $database->query($sql);
			$object_array = array();
			while($row=$database->fetch_array($result_set)){
				$object_array[]=self::instantiate($row);
			}
			return $object_array;
		}
		
		private static function instantiate($record){
		//check that record exists and is an array
			$object = new self;
			
			foreach($record as $attribute=>$value){
				if($object->has_attribute($attribute)){
					$object->$attribute	= $value;
				}
			}
			
			return $object;
		}
		
		private function has_attribute($attribute){
		//get_object_vars returns an associative array with all attributes
			$object_vars = get_object_vars($this);
			
			return array_key_exists($attribute, $object_vars);
		}
		
		
		
	}

?>
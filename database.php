<?php
class Database
{
	private static $user = 'root';
	private static $pass = ''; 
	//private static $pass = 'root'; //change to nothing with xampp
	private static $db = 'webdev_networking';
	private static $dsn = 'mysql:host=localhost;dbname=webdev_networking';
	private static $dbcon;
	private function __construct()
	{

	}
	public static function getDb(){
		if(!isset(self::$dbcon)){
			try{
				self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
				self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e){
				$msg = $e->getMessage();
				echo $msg;
				exit();
			}
		}
		return self::$dbcon;
	}
}
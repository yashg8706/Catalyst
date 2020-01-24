<?php
class Database
{
	private static $user = 'b3afd3866c7767';
	private static $pass = '2d3bddce'; 
	//private static $pass = 'root'; //change to nothing with xampp
	private static $db = 'heroku_dcf0c1cb17b5e2b';
	private static $dsn = 'mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_dcf0c1cb17b5e2b';
	private static $dbcon;
	private function __construct()
	{

	}
	public static function getDb(){
		if(!isset(self::$dbcon)){
			try{
				self::$dbcon = new PDO($dsn, $user, $pass);
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

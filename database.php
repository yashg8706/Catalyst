<?php

class Database
{
	private $url = parse_url(getenv("mysql://b3afd3866c7767:2d3bddce@us-cdbr-iron-east-05.cleardb.net/heroku_dcf0c1cb17b5e2b?reconnect=true"));
	//CLEARDB_DATABASE_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true

	//private static $server = $url["host"];
	private static $username = b3afd3866c7767;
	private static $password = 2d3bddce;
	private static $db = substr($url["path"], 1);
	private static $dsn = 'mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_dcf0c1cb17b5e2b';

	private static $dbcon;
	private function __construct()
	{

	}
	public static function getDb(){
		if(!isset(self::$dbcon)){
			try{
				var_dump ("inside the getDb"); 
				self::$dbcon = new PDO(self::$dsn, self::$username, self::$password);
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
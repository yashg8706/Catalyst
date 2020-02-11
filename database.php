<?php

class Database
{
	private $url = parse_url(getenv("mysql://b3afd3866c7767:2d3bddce@us-cdbr-iron-east-05.cleardb.net/heroku_dcf0c1cb17b5e2b?reconnect=true"));

	private $server = $url["host"];
	private $username = $url["user"];
	private $password = $url["pass"];
	private $db = substr($url["path"], 1);

	private static $dbcon;
	private function __construct()
	{

	}
	public static function getDb(){
		if(!isset(self::$dbcon)){
			try{
				self::$dbcon = new PDO(self::$server, self::$username, self::$password, $db);
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


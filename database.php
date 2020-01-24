<?php


$cleardb_url      = parse_url(getenv("mysql://b3afd3866c7767:2d3bddce@us-cdbr-iron-east-05.cleardb.net/heroku_dcf0c1cb17b5e2b?reconnect=true"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

class Database {
	// Static Class DB Connection Variables (for write and read)
	private static $writeDBConnection;

	// Static Class Method to connect to DB to perform Writes actions
	// handle the PDOException in the controller class to output a json api error
	public static function getDb() {
		if(self::$writeDBConnection === null) {


				self::$writeDBConnection = new PDO("mysql:host=".$cleardb_server."; dbname=".$cleardb_db, $cleardb_username, $cleardb_password);
				self::$writeDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$writeDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



		}

		return self::$writeDBConnection;
	}
}
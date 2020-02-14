<?php

class Database
{
	private $url = parse_url(getenv("mysql://b3afd3866c7767:2d3bddce@us-cdbr-iron-east-05.cleardb.net/heroku_dcf0c1cb17b5e2b?reconnect=true"));
	//CLEARDB_DATABASE_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true

	$url = parse_url(getenv("mysql://b3afd3866c7767:2d3bddce@us-cdbr-iron-east-05.cleardb.net/heroku_dcf0c1cb17b5e2b?reconnect=true"));

	private $server = $url["host"];
	private $username = $url["user"];
	private $password = $url["pass"];
	private $db = substr($url["path"], 1);

	private function __construct()
	{

	}
	public function getDb(){

		$dbcon = new mysqli($this->$server, $this->$username, $this->$password, $this->$db);
		
		if($dbcon->connect_error)
		{
			die("Connection Failed: ".$dbcon->connect_error);
		}		
		return $dbcon;
	}
}



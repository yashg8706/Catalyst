<?php

class Database
{
	//CLEARDB_DATABASE_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true

	
	private $server = "enqhzd10cxh7hv2e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	private $username = "o9lrmsmcosdkvgay";
	private $password = "vk0xitrxvgi9d9zt";
	private $db = "i4z7ktmu4ei6pto7";

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



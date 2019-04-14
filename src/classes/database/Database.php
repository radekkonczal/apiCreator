<?php 

namespace classes\database;

use PDO;

class Database{
	private $servername = DB_HOST;
	private $username = DB_USER;
	private $password = DB_PASS;
	private $dbname = DB_NAME;
	public $connect;

	public function __construct(){
		try {
		    $this->connect = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname,$this->username,$this->password);
		    $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $error)
		    {
		    echo "Connection failed! ";
		    }
	}

	public function dbQuery($queryContent){
		 $response = $this->connect->query($queryContent);
		 return $response;
	}


}

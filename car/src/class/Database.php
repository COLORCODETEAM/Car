<?php
class Database {
	private $con;
	private $host;
	private $username;
	private $password;
	private $result;
	private $db;
	
	function __construct() {
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '1234';
		$this->db = 'project';
		$this->connectDB();
	}
	
	function query($StrQuery) {
		//echo $StrQuery;//for debug
		mysql_query('set names utf8');
		$this->result = mysql_query( $StrQuery );
		return $this->result;
	}
	
	function connectDB() {
		$con = mysql_connect( $this->host, $this->username, $this->password ) or die("can't to connect");
		mysql_select_db($this->db) or die("can't select");
		return $con;
	}
        
        function hasRows(){
            if(mysql_num_rows($this->result)>0)
                return true;
        }
}
?>
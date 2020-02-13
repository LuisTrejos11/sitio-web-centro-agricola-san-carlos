<?php

class Database{

	public function connect(){
		$db = new mysqli('localhost', 'root','','centro_agricola');
		$db->query("SET NAMES 'utf8");
		return $db;
	}

}
<?php
class DB{
	private $link;
	function __construct() {
		global $config;
		$this->link = mysqli_connect('127.0.0.1','root',$config[''],'qlsv_db') or die("can't connect");
		mysqli_query($this->link, "set names 'utf8'");
	}
	public function db_query($query) {
		$result = mysqli_query($this->link, $query);
		return $result;
	}
	public function db_fetch($result) {
		$row = mysqli_fetch_assoc($result);
		return $row;
}
}
?>
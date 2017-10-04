<?php
include 'connect_db.php';
class DB_student extends DB{
function __construct() {
	parent::__construct();
}
function get_all_students() {
	global $config;
	$sql = "select * from tb_sinhvien";
	$query = mysqli_query($config,$sql);
	$result = array();
	if ($query){
		while($row = mysqli_fetch_assoc($query)) {
			$result[]= $row;	
	}
}
return $result;
}	
public function get_student($id = -1){
	$query = "SELECT * FROM tb_sinhvien ";
	if($id != -1) {
		$query =  "WHERE sv_id = $id";
	}
	$student = array();
	$i = 0;
	while($row = $this->db_fetch($result)) {
		$student[$i++] = $row ;	
	}
	return $student ;
}
public function add_student( $name ,$sex ,$birthday ) {
        $query = "INSERT INTO tb_sinhvien(sv_name,sv_sex,sv_birthday) VALUES( $name ,$sex ,$birthday )";
        $result = $this->db_query($query);
        return $result ;
    }
public function edit_student($id , $name ,$sex ,$birthday ){
        $query = "UPDATE tb_sinhvien SET sv_name='$name', sv_sex='$sex',sv_birthday='$birthday' WHERE sv_id=$id";
        $result = $this->db_query($query);
        return $result ;
    }
    
public function delete_student($id){
        $query = "DELETE FROM tb_sinhvien WHERE sv_id=$id";
        $result = $this->db_query($query);
        return $result ;
    }
}
?>

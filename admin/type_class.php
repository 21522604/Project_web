<?php
    include "database.php";
?>
<?php
    class type {
        private $db;

        public function __construct(){
            $this -> db = new Database();
        }

        public function insert_type($category_id, $type_name){
            $query = "INSERT INTO tbl_type (category_id, type_name) VALUES ('$category_id','$type_name')";
            $result = $this -> db ->insert($query);
            header('Location:typelist.php');
            return $result;
        }
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_type(){
            $query = "SELECT tbl_type.*, tbl_category.category_name FROM tbl_type INNER JOIN tbl_category ON tbl_type.category_id = tbl_category.category_id ORDER BY tbl_type.type_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function get_type($type_id){
            $query = "SELECT * FROM tbl_type WHERE type_id = '$type_id'";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function update_type($category_id, $type_name,$type_id){
            $query = "UPDATE tbl_type SET type_name = '$type_name', category_id = '$category_id'  WHERE type_id = '$type_id'";
            $result = $this -> db -> update($query);
            header('Location:typelist.php');
            return $result;
        }
        public function delete_type($type_id){
            $query = "DELETE FROM tbl_type WHERE type_id = '$type_id'";
            $result = $this -> db -> delete($query);
            header('Location:typelist.php');
            return $result;
        }
    }
?>

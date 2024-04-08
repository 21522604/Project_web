<?php
    include "database.php";
?>
<?php
    class product {
        private $db;

        public function __construct(){
            $this -> db = new Database();
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
        public function insert_type(){
            $product_name= $_POST['product_name'];
            $category_id= $_POST['category_id'];
            $type_id= $_POST['type_id'];
            $product_price= $_POST['product_price'];
            $product_sale= $_POST['product_sale'];
            $product_describle= $_POST['product_describle'];
            $product_img= $_FILES['product_img']['name'];
            move_uploaded_file($_FILES['product_img']['tmp_name'],"upload/".$_FILES['product_img']['name']);
            $query = "INSERT INTO tbl_product (
                product_name,
                category_id,
                type_id,
                product_price,
                product_sale,
                product_describle,
                product_img) VALUES (
                    '$product_name',
                    '$category_id',
                    '$type_id',
                    '$product_price',
                    '$product_sale',
                    '$product_describle',
                    '$product_img')";
            $result = $this -> db ->insert($query);
            header('Location:typelist.php');
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

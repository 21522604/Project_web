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
        public function show_type_ajax($category_id){
            $query = "SELECT * FROM tbl_type WHERE category_id = '$category_id'";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function insert_product(){
            $product_name= $_POST['product_name'];
            $category_id= $_POST['category_id'];
            $type_id= $_POST['type_id'];
            $product_price= $_POST['product_price'];
            $product_sale= $_POST['product_sale'];
            $product_describle= $_POST['product_describle'];
            $product_img= $_FILES['product_img']['name'];
            $filetarget = basename($_FILES['product_img']['name']);
            $filetype = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
            $filesize = $_FILES['product_img']['size']
            if(file_exists("uploads/$filetarget")){
                $alert = "File da ton tai";
                return $alert;
            }
            else{
                if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"){
                    $alert = "Hay chon file anh hop le";
                    return $alert;
                }
                else{
                    if($filesize > 1000000){
                        $alert = "File khong duoc lon hon 1MB";
                        return $alert;
                    }
                    else{
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
                        if($result){
                            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                            $result = $this->db->select($query)->fetch_assoc();
                            $product_id = $result['product_id'];
                            $filename = $_FILES['product_img_describle']['name'];
                            $filetmp = $_FILES['product_img_describle']['tmp_name'];
                            foreach($filename as $key => $value) {
                                move_uploaded_file($filetmp[$key],"upload/".$value);
                                $query = "INSERT INTO tbl_product_img_describle (product_id,product_img_describle) VALUES ('$product_id','$value')";
                                $result = $this -> db ->insert($query);
                            }
                        }
                    }
                    
                }
                
            }
            
            //header('Location:typelist.php');
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

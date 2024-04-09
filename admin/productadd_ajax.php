<?php
    include "product_class.php";
    $product = new product;
    $category_id = $_GET['category_id'];
?>

<?php
    $show_type_ajax = $product->show_type_ajax($category_id);
    if($show_type_ajax){
        while($result= $show_type_ajax->fetch_assoc()){  
?>
    <option value="<?php echo $result['type_id']?>"><?php echo $result['type_name']?></option>
    <?php
        }
    }
?>
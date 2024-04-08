<?php
include "header.php";
include "slider.php";
include "product_class.php";
?>
<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $insert_product = $product->insert_product($_POST, $_FILES);

    }
?>

        <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" required type="text">
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label>
                    <select name="category_id" id="">
                        <option value="#">--Chọn--</option>
                        <?php
                            $show_category = $product->show_category();
                            if($show_category){
                                while($result= $show_category->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="type_id" id="">
                    <option value="#">--Chọn--</option>
                        <?php
                            $show_type = $product->show_type();
                            if($show_type){
                                while($result= $show_type->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $result['type_id']?>"><?php echo $result['type_name']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" required type="text">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input name="product_sale" required type="text">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea name="product_describle" required name="" id="" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_img" required type="file" name="" id="">
                    <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
                    <input name="product_img_describle" required multiple type="file" name="" id="">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
        
    </section>
</body>
</html>
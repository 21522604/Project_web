<?php
include "header.php";
include "slider.php";
include "product_class.php";
?>
<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo'<pre>';
        // echo print_r($_FILES['product_img_describle']['name']);
        // echo'</pre>';

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
                    <select name="category_id" id="category_id">
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
                    <select name="type_id" id="type_id">
                    <option value="#">--Chọn--</option>
                        
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" required type="text">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input name="product_sale" required type="text">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea name="product_describle" required id="editor" cols="30" rows="10"></textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ), {
                                ckfinder: {
                                    uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                                },
                                toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
                            } )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <style>
                        /*Textbox*/
                        .ck-editor__editable {
                            min-height: 350px;
                            max-height: 350px;
                            min-width: 700px;
                            max-width: 700px;
                        }
                        /*Toolbar*/
                        .ck-editor__top {
                            min-width: 700px;
                            max-width: 700px;
                        }
                    </style>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <span style="color: red"><?php if(isset($insert_product)){
                        echo $insert_product;
                    }
                    ?></span>
                    <input name="product_img" required type="file" name="" id="">
                    <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
                    <input name="product_img_describle[]" required multiple type="file" name="" id="">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
        
    </section>
</body>
<script>
    $(document).ready(function(){
        $('#category_id').change(function(){
            //alert($(this).val());
            var category_id_value = $(this).val();
            $.get("productadd_ajax.php",{category_id:category_id_value},function(data){
                $("#type_id").html(data);
            })
        })
    })
</script>
</html>
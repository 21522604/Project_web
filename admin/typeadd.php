<?php
include "header.php";
include "slider.php";
include "type_class.php";
?>

<?php
    $type = new type;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $category_id = $_POST['category_id'];
        $type_name = $_POST['type_name'];
        $insert_type = $type->insert_type($category_id, $type_name);

    }
?>
<div class="admin-content-right">
            <div class="admin-content-right-type_add">
                <h1>Thêm loại sản phẩm</h1> <br>
                <form action="" method="post">
                    <select name="category_id" id="">
                        <option value="#">--Chọn danh mục--</option>
                        <?php
                        $show_category = $type->show_category();
                        if($show_category){
                            while($result= $show_category->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select> <br>
                    <input required name="type_name" type="text" placeholder="Nhập tên loại sản phẩm">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
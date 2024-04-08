<?php
include "header.php";
include "slider.php";
include "type_class.php";
?>

<?php
    $type = new type;
    $type_id = $_GET['type_id'];
    $get_type = $type -> get_type($type_id);
    if($get_type){
        $result = $get_type -> fetch_assoc();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $category_id = $_POST['category_id'];
        $type_name = $_POST['type_name'];
        $update_type = $type->update_type($category_id, $type_name,$type_id);

    }
?>
<div class="admin-content-right">
            <div class="admin-content-right-type_add">
                <h1>Sửa loại sản phẩm</h1> <br>
                <form action="" method="post">
                    <select name="category_id" id="">
                        <option value="#">--Chọn danh mục--</option>
                        <?php
                        $show_category = $type->show_category();
                        if($show_category){
                            while($categoryresult= $show_category->fetch_assoc()){  
                        ?>
                        <option <?php if($result['category_id'] == $categoryresult['category_id']){echo "SELECTED";}?> value="<?php echo $categoryresult['category_id']?>"><?php echo $categoryresult['category_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select> <br>
                    <input required name="type_name" type="text" placeholder="Nhập tên loại sản phẩm" value="<?php echo $result['type_name'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
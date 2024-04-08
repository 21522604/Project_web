<?php
include "header.php";
include "slider.php";
include "type_class.php"
?>

<?php
    $type = new type;
    $show_type = $type->show_type();
?>

<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    if($show_type){
                        $i=0;
                        while($result = $show_type->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['type_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><?php echo $result['type_name'] ?></td>
                        <td><a href="typeedit.php?type_id=<?php echo $result['type_id'] ?>">Sửa</a>|<a href="typedelete.php?type_id=<?php echo $result['type_id'] ?>">Xoá</a></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>
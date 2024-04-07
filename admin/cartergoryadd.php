<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php"
?>

<?php
    $cartegory = new cartegory;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $cartgory_name = $_POST['cartgory_name'];
        $insert_cartegory = $cartegory->insert_cartegory($cartgory_name);

    }
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Them danh muc</h1>
                <form action="" method="post">
                    <input required name="cartgory_name" type="text" placeholder="Nhap ten danh muc">
                    <button type="submit">Them</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
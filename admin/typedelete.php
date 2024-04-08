<?php
    include "type_class.php";
    $type = new type;
    $type_id = $_GET['type_id'];
    $delete_type = $type -> delete_type($type_id);
?>

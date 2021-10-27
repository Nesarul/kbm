<?php
    require_once('../admin/db/db.php');
    $errors[] = "";
    if(isset($_POST['m'])){
        if(isset($_POST['y'])){
            $sql = "SELECT * FROM juma WHERE MONTH(juma_date) = ".$_POST['m']." AND YEAR(juma_date) = ".$_POST['y'];
            $res = db::getInstance()->query($sql);
        }else $errors.msg = "Year Not set or Year Errors";
    }else $errors.msg = "Month Not Set Or Month Errors"

    if(count($errors) != 0)
        $res = $errors;
    
    echo json_encode($res);
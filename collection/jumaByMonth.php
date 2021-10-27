<?php
    require_once('../admin/db/db.php');
    $errors[] = "";
    if(isset($_POST['m'])){
        if(isset($_POST['y'])){
            $res = db::getInstance()->query("SELECT * FROM juma WHERE MONTH(juma_date) = '".$_POST['m']."' AND YEAR(juma_date) = '".$_POST['y']."'")->getResults();
        }else $errors['msg'] = "Year Not set or Year Errors";
    }else $errors['msg'] = "Month Not Set Or Month Errors";
    // if(lenth($errors) > 0 )
    //     $res = $errors;
    echo json_encode($res);
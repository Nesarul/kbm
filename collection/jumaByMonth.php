<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    if(isset($_POST['m'])){
        if(isset($_POST['y'])){
            $output['res'] = db::getInstance()->query("SELECT * FROM juma WHERE MONTH(juma_date) = '".$_POST['m']."' AND YEAR(juma_date) = '".$_POST['y']."'")->getResults();
            $output['mTotal'] = db::getInstance()->query("SELECT SUM(juma_amount)  as mTotal FROM juma WHERE MONTH(juma_date) = '".$_POST['m']."' AND YEAR(juma_date) = '".$_POST['y']."'")->getResults();
        }else $output['msg'] = "Year Not set or Year Errors";
    }else $output['msg'] = "Month Not Set Or Month Errors";
   
    echo json_encode($output);

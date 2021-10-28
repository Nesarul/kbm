<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "No Problem Found";
    if(isset($_POST['y'])){
        $output['res'] = db::getInstance()->query("SELECT MONTH(juma_date) AS mth, SUM(juma_amount) AS amount FROM juma WHERE year(juma_date) = '".$_POST['y']."' GROUP BY month(juma_date)")->getResults();
        $output['yTotal'] = db::getInstance()->query("SELECT SUM(juma_amount) as yTotal FROM juma WHERE year(juma_date) = '".$_POST['y']."'")->getResults();
    }else $output['msg'] = "Year Not set or Year Errors";
   
    echo json_encode($output);
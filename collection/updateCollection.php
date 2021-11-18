<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "Data Entered Successfully!";
    $output['res'] = db::getInstance()->query("SELECT MONTH(coll_date) AS mth, SUM(coll_amount) AS amount FROM collection WHERE year(coll_date) = '".$_POST['y']."' GROUP BY month(coll_date)")->getResults();
   
    echo json_encode($output);
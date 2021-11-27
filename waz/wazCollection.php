<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "success";
    $retVal = "" ;
    if(isset($_POST['y'])){
        $res = db::getInstance()->query("SELECT * FROM waz_collection WHERE YEAR(waz_date) = ". $_POST['y'])->getResults();
        foreach($res as $key => $rec){
            $retVal.='<tr><td>'.$rec->waz_receipt.'</td><td>'.$rec->waz_date.'</td><td>'.$rec->waz_name.'</td><td>'.$rec->waz_description.'</td><td>'.$rec->waz_amount.'</td></tr>';
        }
    }else $status['msg'] = "Receipt No Not Set";
    echo json_encode($retVal); 
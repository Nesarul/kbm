<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "success";
    
    if(isset($_POST['waz_date'])){
        if(isset($_POST['waz_receipt'])){
            if(isset($_POST['waz_amount'])){
                if(isset($_POST['waz_name'])){
                    db::getInstance()->insert('waz_collection',array(
                        'waz_date'          => $_POST['waz_date'],
                        'waz_name'          => $_POST['waz_name'],
                        'waz_receipt'       => $_POST['waz_receipt'],
                        'waz_description'   => $_POST['waz_desc'],
                        'waz_amount'        => $_POST['waz_amount'],
                    ));
                }else $status['msg'] = "Donor Name Not Set";
            }else $status['msg'] = "Amount Not Set";
        }else $status['msg'] = "Collection Date Not Set";
    }else $status['msg'] = "Receipt No Not Set";
    echo json_encode($status); 
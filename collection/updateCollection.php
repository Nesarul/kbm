<?php
    require_once('../admin/db/db.php');
    $errors['msg'] = "Data Entered Successfully!";
    if(isset($_POST['nc_receipt'])){
        if(isset($_POST['coll-date'])){
            if(isset($_POST['coll-amount'])){
                db::getInstance()->insert('juma',array(
                    'juma_receipt_no'   => $_POST['coll-rec'],
                    'juma_date'         => $_POST['coll-date'],     
                    'juma_amount'       => $_POST['coll-amount']
                ));
            }else $errors['msg'] = "Amount Not Set";
        }else $errors['msg'] = "Collection Date Not Set";
    }else $errors['msg'] = "Receipt No Not Set";
   
    $errors['mth'] = date("m",strtotime($_POST['coll-date']));
    $errors['yr'] = date('Y',strtotime($_POST['coll-date']));
    echo json_encode($errors);
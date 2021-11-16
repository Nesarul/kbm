<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "Data Entered Successfully!";
    
    if(isset($_POST['don_date'])){
        if(isset($_POST['don_receipt'])){
            if(isset($_POST['don_amount'])){
                if(isset($_POST['don_name'])){
                    db::getInstance()->insert('donation',array(
                        'don_date'          => $_POST['don_date'],
                        'don_receipt'       => $_POST['don_receipt'],
                        'don_doner'         => $_POST['don_name'],
                        'don_doner_father'  => $_POST['don_father'],
                        'don_doner_address' => $_POST['don_address'],
                        'don_doner_phone'   => $_POST['don_phone'],
                        'don_amount'        => $_POST['don_amount'],
                        'don_remarks'       => $_POST['don_remarks']
                    ));
                }else $status['msg'] = "Donor Name Not Set";
            }else $status['msg'] = "Amount Not Set";
        }else $status['msg'] = "Collection Date Not Set";
    }else $status['msg'] = "Receipt No Not Set";
    echo json_encode($status);
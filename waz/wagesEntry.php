<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "success";
    
    if(isset($_POST['wages_date'])){
        if(isset($_POST['wages_voucher'])){
            if(isset($_POST['wages_amount'])){
                if(isset($_POST['wages_name'])){
                    db::getInstance()->insert('wages',array(
                        'wages_date'        => $_POST['wages_date'],
                        'wages_voucher_no'  => $_POST['wages_voucher'],
                        'wages_name'        => $_POST['wages_name'],
                        'wages_designation' => $_POST['wages_deg'],
                        'wages_amount'      => $_POST['wages_amount'],
                        'wages_remarks'     => $_POST['wages_remarks'],
                    ));
                }else $status['msg'] = "Donor Name Not Set";
            }else $status['msg'] = "Amount Not Set";
        }else $status['msg'] = "Collection Date Not Set";
    }else $status['msg'] = "Receipt No Not Set";
    echo json_encode($status);
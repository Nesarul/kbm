<?php
require_once('../admin/db/db.php');
$status['msg'] = "success";

if(isset($_POST['waz_exp_date'])){
    if(isset($_POST['waz_exp_voucher'])){
        if(isset($_POST['waz_exp_desc'])){
            if(isset($_POST['waz_exp_amount'])){
                db::getInstance()->insert('waz_expenses',array(
                    'waz_date'          => $_POST['waz_exp_date'],
                    'waz_voucher_no'    => $_POST['waz_exp_voucher'],
                    'waz_description'   => $_POST['waz_exp_desc'],
                    'waz_amount'        => $_POST['waz_exp_amount'],
                    'waz_remarks'       => $_POST['waz_exp_remarks'],
                ));
            }else $status['msg'] = "Expense Amount Not Set";
        }else $status['msg'] = "Expense Description";
    }else $status['msg'] = "Expense Voucher Date Not Set";
}else $status['msg'] = "Expense Date Not Set";
echo json_encode($status); 
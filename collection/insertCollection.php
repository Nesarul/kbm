<?php
    require_once('../admin/db/db.php');
    $status['msg'] = "Data Entered Successfully!";
    if(isset($_POST['date'])){
        if(isset($_POST['receipt'])){
            if(isset($_POST['resident'])){
                if(isset($_POST['amount'])){
                    if(isset($_POST['col'])){
                        db::getInstance()->insert('collection',array(
                            'coll_date'     => $_POST['date'],
                            'coll_receipt'  => $_POST['receipt'],
                            'coll_amount'   => $_POST['amount'],
                            'coll_resident' => $_POST['resident'],
                            'coll_by'       => $_POST['col']
                        ));
                    }else $status['msg'] = "Collector Required";
                }else $status['msg'] = "Residednt Required";
            }else $status['msg'] = "Amount Not Set";
        }else $status['msg'] = "Collection Date Not Set";
    }else $status['msg'] = "Receipt No Not Set";
   
    echo json_encode($status);
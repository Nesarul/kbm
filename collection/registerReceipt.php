<?php
    require_once('../admin/db/db.php');
    $errors['msg'] = "Data Entered Successfully!";
    
    if(isset($_POST['no'])){
        if(isset($_POST['w'])){
            $isAval = db::getInstance()->get('used_receipt',array('used_rec_no','=',$_POST['coll-rec']))->count();
        }
        // First check receipt is available. 
        
        if($isAval > 0){
            $errors['msg'] = "1";
            echo json_encode($errors);
            exit(0);
        }

        if(isset($_POST['coll-date'])){
            if(isset($_POST['coll-amount'])){
                db::getInstance()->insert('used_receipt',array(
                    'used_rec_no'   => $_POST['coll-rec'],
                    'used_on'         => "Juma",     
                ));
            }else $errors['msg'] = "Amount Not Set";
        }else $errors['msg'] = "Collection Date Not Set";
    }else $errors['msg'] = "Receipt No Not Set";
   

    echo json_encode($errors);
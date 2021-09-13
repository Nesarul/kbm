<?php
    require_once('./functions.php');
    require_once('./db/db.php');
    if(isset($_POST['userEmail'])){
        if(isset($_POST['userPassword'])){
            // Get Data.
            $res = db::getInstance()->get('users',array("user_email","=",$_POST['userEmail']))->getResults();
            if($res){
                // Email found verify password;
                if(password_verify($_POST['userPassword'],$res[0]->user_password)){
                    $data->name     = $res[0]->user_name;
                    $data->fn       = $res[0]->user_fatherName;
                    $data->mobile   = $res[0]->user_phone;
                    $data->email    = $res[0]->user_email;
                    $data->id       = $res[0]->user_id;
                    header('location: ../users/dashboard.php');
                } else header('location: ../index.php?w=1');
            } else header('location: ../index.php?w=2');
        }
    }
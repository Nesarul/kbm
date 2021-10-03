<?php
    $errors[]="";
    if(isset($_POST)){
        $id = $_POST['id'];
        $name = $_POST['name'];
    }
    $pk = array('firstName'=>'Nesarul','lastName'=>'Hoque');
    echo json_encode($pk);
?>
<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    
    $sql = "SELECT 
    cl.client_name,
    rc.rec_book_no, 
    rc.rec_issue_date,
    rc.rec_start_no,
    rc.rec_end_no,
    cl1.client_name as issuer FROM clients AS cl 
    RIGHT JOIN receipt AS rc ON rc.rec_client_id = cl.client_id
    LEFT JOIN clients AS cl1 ON rc.rec_issue_by = cl1.client_id";

    $output['res'] = db::getInstance()->query($sql)->getResults();
   
    echo json_encode($output);
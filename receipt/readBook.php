<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    
    $sql = "SELECT 
    cl.resident_name,
    rc.rec_book_no, 
    rc.rec_issue_date,
    rc.rec_start_no,
    rc.rec_end_no,
    cl1.resident_name as issuer FROM residents AS cl 
    RIGHT JOIN receipt AS rc ON rc.rec_resident_id = cl.resident_id
    LEFT JOIN residents AS cl1 ON rc.rec_issue_by = cl1.resident_id";

    $output['res'] = db::getInstance()->query($sql)->getResults();
   
    echo json_encode($output);
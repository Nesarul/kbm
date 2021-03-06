<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    if(isset($_POST['rec-book']) && isset($_POST['rec-issue-date']) && isset($_POST['rec-resident-name']) && isset($_POST['rec-start-no']) && isset($_POST['rec-end-no'])){
        $book = $_POST['rec-book'];
        $issueDate = $_POST['rec-issue-date'];
        $residentName = $_POST['rec-resident-name'];
        $startNo = $_POST['rec-start-no'];
        $endNo = $_POST['rec-end-no'];
        db::getInstance()->insert('receipt',array(
            "rec_book_no" => $book,
            "rec_resident_id" => $residentName,
            "rec_start_no" => $startNo,
            "rec_end_no" => $endNo,
            "rec_issue_date" => $issueDate,
            "rec_issue_by" => 1
        ));
    }
    echo json_encode($output);
<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    if(isset($_POST['y'])){
            $res = db::getInstance()->query("SELECT MONTH(coll_date) AS mth, SUM(coll_amount) AS amount FROM collection WHERE year(coll_date) = '".$_POST['y']."' GROUP BY month(coll_date)")->getResults();
    }else $output['msg'] = "Year Not set or Year Errors";

    $date = "";
    $amount = "";
    $colors = "";
    $bar_graph = "";
    
    foreach($res as $key => $value){
        $amount .= '"'.$value->amount.'",';
        $date .= '"'.$value->mth.'",';
        $colors .= '"rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.5)",';
    }
    $amount = substr($amount,0,-1);             // Remove Last Comma. 
    $date = substr($date,0, -1);                // Remove Last Comma. 
    $colors = substr($colors,0,-1);

    $bar_graph = '
    <canvas id="cg" data-settings=
    \'{
        "type":"bar",
        "data": 
        {
            "labels":['. $date .'],
            "datasets":
            [{
                "label": "Resident Collection",
                "data":['.$amount.'],
                "backgroundColor": ['.$colors.'],
                "borderColor": ['.$colors.'],
                "borderWidth": 1
            }]
        },
        "options":
        {
            "legend": 
            {
                "display": true
            }
        }
    }\'
    ></canvas>';
    echo $bar_graph;
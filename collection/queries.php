<?php
    require_once('../admin/db/db.php');
    $output['msg'] = "Everything is Fine";
    if(isset($_POST['m'])){
        if(isset($_POST['y'])){
            $res = db::getInstance()->query("SELECT * FROM juma WHERE MONTH(juma_date) = '".$_POST['m']."' AND YEAR(juma_date) = '".$_POST['y']."'")->getResults();
        }else $output['msg'] = "Year Not set or Year Errors";
    }else $output['msg'] = "Month Not Set Or Month Errors";

    $date = "";
    $amount = "";
    $colors = "";
    $bar_graph = "";
    
    foreach($res as $key => $value){
        $amount .= '"'.$value->juma_amount.'",';
        $date .= '"'.$value->juma_date.'",';
        $colors .= '"rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.5)",';
    }
    $amount = substr($amount,0,-1);             // Remove Last Comma. 
    $date = substr($date,0, -1);                // Remove Last Comma. 
    $colors = substr($colors,0,-1);

    $bar_graph = '
    <canvas id="graph" data-settings=
    \'{
        "type":"bar",
        "data": 
        {
            "labels":['. $date .'],
            "datasets":
            [{
                "label": "Juma Collection",
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
<?php 
    require_once('../assets/sidebar/sidebarImages.php');
    require_once('../admin/db/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js" integrity="sha512-CWVDkca3f3uAWgDNVzW+W4XJbiC3CH84P2aWZXj+DqI6PNbTzXbl1dIzEHeNJpYSn4B6U8miSZb/hCws7FnUZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-custom">
                    <div class="container-fluid">
                        <a href="#"><img class="main-logo" src='../assets/images/icons/logo-masjid-design-40106-64x64.ico'/></a>

                        <!-- <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent"> -->
                        <div class="collapse navbar-collapse">
                            <h4>Khodaibari Jame Masjid</h4>
                        </div>
                    </div>
                </nav>                        
            </div>
        </div>
    </div>

    <style>
        
    </style>
    <div class="left-bar">
        <div id="su-menu" onclick="expMenu();">
            <svg id="exp_status" class="d-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
            </svg>

            <svg id="exp_status1" class="d-block" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
            </svg>

        </div>
        <nav id="sidebar">
            <ul  class="list-unstyled">
                <?php
                    $menu_data = simplexml_load_file("../assets/sidebar/sidebar.xml") or die("Failed to load");
                    $imageIndex = 0;
                    foreach($menu_data->item as $key => $rec):
                ?>
                    <li>

                    <a href="<?php echo $rec->link; ?>">
                        <?php echo $images[$imageIndex++]; ?>    
                        <span><?php echo $rec->caption; ?></span>
                    </a>

                </li> 
                <?php endforeach; ?>
            </ul>

        </nav>
    </div>
    <div class="right-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <img src="../assets/images/banner.jpg" alt="Banner" class="w-100" />
                </div>
            </div>
        </div>
    
        <div class="container-fluid">
            <div class="row">
                <div class="db-title">
                    <h3>Dashboard</h3>
                    <div class="stripe"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../collection/collection.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <?php
                                            $sql = "SELECT SUM(coll_amount) AS cl FROM collection WHERE year(coll_date) = ".date("Y")." GROUP BY year(coll_date)";
                                            $collAmount = db::getInstance()->query($sql)->getResults();
                                        ?>
                                        <h5>Resident Collection</h5>
                                        <h6>Yearly: <?php echo $collAmount[0]->cl; ?></h6>
                                        <h6>Current Month: </h6>

                                    </div>
                                    <div id="collGraph" class="p-3 bg-ligh"></div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../collection/juma.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <?php
                                            $sql = "SELECT SUM(juma_amount) AS cl FROM juma WHERE year(juma_date) = ".date("Y");
                                            $jumaAmount = db::getInstance()->query($sql)->getResults();
                                        ?>
                                        <h5>Juma Collection</h5>
                                        <h6>Yearly: <?php echo $jumaAmount[0]->cl;?> </h6>
                                        <h6>Current Month: </h6>
                                    </div>
                                    <div id="divGraph" class="p-3 bg-ligh"></div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../donation/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <?php
                                            $sql = "SELECT SUM(don_amount) AS cl FROM donation WHERE year(don_date) = ".date("Y");
                                            $donAmount = db::getInstance()->query($sql)->getResults();
                                        ?>
                                        <h5>Donation</h5>
                                        <h6>Yearly: <?php echo $donAmount[0]->cl;?> </h6></h6>
                                        <h6>Current Month: </h6>
                                    </div>
                                    <div id="donGraph" class="p-3 bg-ligh"></div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../salary/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body" style="min-height:250px">
                                        <h5>Salary - <?php echo date("Y"); ?></h5>
                                        <hr>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <?php
                                                    $sql = "SELECT j.job_title, SUM(w.wages_amount) AS salary FROM wages AS w RIGHT JOIN jobs AS j ON j.job_id = w.wages_designation GROUP BY w.wages_designation";
                                                    $res = db::getInstance()->query($sql)->getResults();
                                                    foreach($res as $key => $jr):
                                                ?>
                                                    <div class="col-sm-6">
                                                        <h6><?php echo $jr->job_title; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6 text-end">
                                                        <h6><?php echo $jr->salary; ?></h6>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <hr>
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../bills/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body" style="min-height:250px">
                                        <h5>Utility Bills</h5>
                                        <hr>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6>Electricity</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>-</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Stationary</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>120000</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Grossary</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>96000</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Labour</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>96000</h6>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../bills/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body" style="min-height:250px">
                                        <h5>Waz Mahfil</h5>
                                        <hr>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6>Collection : </h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6><?php 
                                                    $sql = "SELECT SUM(waz_amount) AS amount FROM waz_collection WHERE year(waz_date) = ".date("Y");
                                                            $res = db::getInstance()->query($sql)->getResults();
                                                            echo $res[0]->amount;
                                                        ?>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Stationary</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>120000</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Grossary</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>96000</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>Labour</h6>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <h6>96000</h6>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-4">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h5>Simple Account - <?php echo date("Y") ?></h5>
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Dr.</th>
                                                <th>Cr.</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Resident Collection:</td>
                                                <td class="text-end"><?php echo number_format($collAmount[0]->cl,2,".",","); ?> </td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>Juma Collection:</td>
                                                <td class="text-end"><?php echo number_format($jumaAmount[0]->cl,2,".",",");?></td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Get Donation:</td>
                                                <td class="text-end"><?php echo number_format($donAmount[0]->cl,2,".",",");?></td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Waz Collection:</td>
                                                <td class="text-end"><?php echo number_format($donAmount[0]->cl,2,".",",");?></td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>Khatib: </td>
                                                <td></td>
                                                <td class="text-end">196,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td>Salary Imam: </td>
                                                <td></td>
                                                <td class="text-end">196,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>06</td>
                                                <td>Salary Muazzin : </td>
                                                <td class="text-end"></td>
                                                <td class="text-end">80,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>07</td>
                                                <td>Salary Cleaner : </td>
                                                <td class="text-end"></td>
                                                <td class="text-end">80,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>08</td>
                                                <td>Waz Expences : </td>
                                                <td class="text-end"></td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>09</td>
                                                <td>Utility Bills : </td>
                                                <td class="text-end"></td>
                                                <td class="text-end"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h6> </h6>
                                    <h6> </h6>
                                    <h6> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"../collection/ucg.php",
                type: "post",
                data: {
                    y:(new Date).getFullYear()
                },
                success: function(bar_graph){
                    $("#collGraph").html(bar_graph);
                    $("#cg").chart = new Chart($("#cg"),$("#cg").data("settings"));
                }
            });

            $.ajax({
                url:"../collection/queries.php",
                type: "post",
                data: {
                    m:(new Date).getMonth() + 1,y:(new Date).getFullYear()
                },
                success: function(bar_graph){
                    $("#divGraph").html(bar_graph);
                    $("#graph").chart = new Chart($("#graph"),$("#graph").data("settings"));
                }
            });

            $.ajax({
                url:"../collection/udn.php",
                type: "post",
                data: {
                    y:(new Date).getFullYear()
                },
                success: function(bar_graph){
                    $("#donGraph").html(bar_graph);
                    $("#dg").chart = new Chart($("#dg"),$("#dg").data("settings"));
                }
            });
        });
    </script>
</body>
</html>
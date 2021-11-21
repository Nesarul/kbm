<?php require_once('../assets/sidebar/sidebarImages.php');?>
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
                    Dear Bangladesh.
                    <div class="stripe"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../collection/collection.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <h5>Monthly Collection</h5>
                                        <h6>Collected Amount: </h6>
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
                                        <h5>Juma Collection</h5>
                                        <h6>Yearly: </h6>
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
                                        <h5>Donation</h5>
                                        <h6>Yearly: </h6>
                                        <h6>Current Month: </h6>
                                    </div>
                                    <div id="donGraph" class="p-3 bg-ligh"></div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../salary/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                    <h5>Salary</h5>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../bills/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                    <h5>Utility Bills</h5>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-4">
                            <a class="card-link" href="../bills/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                    <h5>Vivid</h5>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-12">
                    <h5>Account Ledger</h5>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Description</th>
                                <th>Dr.</th>
                                <th>Cr.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    
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
        });
    </script>
</body>
</html>
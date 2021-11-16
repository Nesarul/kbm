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
            <div class="row bg-f6 p-5">
                <div class="col">
                    <div class="row ico-img">
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <a class="card-link" href="../collection/collection.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                    <h4>Monthly Collection</h4>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <a class="card-link" href="../collection/juma.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <h4>Juma Collection</h4>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <a class="card-link" href="../donation/index.php">
                                <div class="card shadow card-db">
                                    <div class="card-body">
                                        <h4>Donation</h4>
                                        <h5>Tk. 1,32,353.00</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h4>Vivid</h4>
                                    <h5>Tk. 1,32,353.00</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h4>Electricity bill</h4>
                                    <h5>Tk. 1,32,353.00</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h4>Utility Bills</h4>
                                    <h5>Tk. 1,32,353.00</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h4>Renuvation</h4>
                                    <h5>Tk. 1,32,353.00</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 col-lg-3 my-2">
                            <div class="card shadow card-db">
                                <div class="card-body">
                                    <h4>Cash Expenses</h4>
                                    <h5>Tk. 1,32,353.00</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <script>
        function expMenu(){
            $('[id^=exp_]').toggleClass('d-none').toggleClass('d-block');
            $('#sidebar, #su-menu').toggleClass('active');
            $('.right-bar').toggleClass('right-bar-active');
        }
    </script>
</body>
</html>
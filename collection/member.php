<?php
    require_once('../assets/sidebar/sidebarImages.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Collection</title>
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
            <div class="row bg-f6">
                <div class="col">
                    <h4>Juma Collection</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>Collection By Week for the Month of</thead>
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01.01.2021</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>01.01.2021</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>01.01.2021</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>01.01.2021</td>
                                            <td>8,530</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>01.01.2021</td>
                                            <td>8,530</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>Collection By Month for the Year of</thead>
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>January</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>February</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>March</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>April</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>May</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>June</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>August</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>September</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>October</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>November</td>
                                            <td>8,530</td>
                                        </tr>
                                        <tr>
                                            <td>December</td>
                                            <td>8,530</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Grand Total</td>
                                            <td>8,530</td>
                                        </tr>
                                    </tfoot>
                                </table>
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
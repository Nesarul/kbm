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
    <title>Donation</title>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/selectize.default.css">
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
                <div class="col-12">
                    <div class="row py-2">
                        <div class="col-6">
                            <h4>Donation</h4>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#newDonation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                                New Entry
                            </button>
                        </div>
                        <hr class="mt-2">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 offset-md-2">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo date('F Y'); ?></h5>
                            <div class="responsive-table">
                                <table class="table">
                                    <caption>Donation</caption>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Receipt No.</th>
                                            <th>Donar</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM donation";
                                            $res = db::getInstance()->query($sql)->getResults();
                                            foreach($res as $key => $result):
                                        ?>
                                        <tr>
                                            <td><?php echo $result->don_date; ?></td>
                                            <td><?php echo $result->don_receipt; ?></td>
                                            <td><?php echo $result->don_doner; ?></td>
                                            <td><?php echo $result->don_amount; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="newDonation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newDonationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newDonationLabel">New Donation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formDonation">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <label for="don_date" class="form-label">Date</label>
                                        <input class="form-control" type="date" name="don_date" id="don_date" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <label for="don_receipt" class="form-label">Receipt No.</label>
                                        <input type="number" class="form-control" id="don_receipt" name="don_receipt">
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                                        <label for="don_amount" class="form-label">Amount Tk.</label>
                                        <input type="number" class="form-control" id="don_amount" name="don_amount">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="don_name" class="form-label">Donar</label>
                                        <input type="text" class="form-control" id="don_name" name="don_name">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="don_father" class="form-label">Donar's Father Name</label>
                                        <input type="text" class="form-control" id="don_father" name="don_father">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="don_address" class="form-label">Donar's Address</label>
                                        <input type="text" class="form-control" id="don_address" name="don_address">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="don_phone" class="form-label">Donar's Phone</label>
                                        <input type="text" class="form-control" id="don_phone" name="don_phone">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                       <label for="don_remarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" id="don_remarks" name="don_remarks">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label for="nc_resident">&nbsp;</label>
                                        <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label for="nc_resident">&nbsp;</label>
                                        <button type="button" onclick="updateDonation();" class="btn btn-primary form-control">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h5 id="success-entry" class="text-success d-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg> <span class="align-baseline">Record Inserted Successfully!</span></h5>
                        <h5 id="failed-entry" class="text-danger d-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg> <span class="align-baseline">Something Went Wrong!</span></h5>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/selectize.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        $('#nc_resident, #nc_collector').selectize();
        function expMenu(){
            $('[id^=exp_]').toggleClass('d-none').toggleClass('d-block');
            $('#sidebar, #su-menu').toggleClass('active');
            $('.right-bar').toggleClass('right-bar-active');
        }
    </script>
</body>
</html>
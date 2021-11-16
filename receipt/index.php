<?php
    require_once('../admin/db/db.php');
    require_once('../assets/sidebar/sidebarImages.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juma Collection</title>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/select2/css/select2.css">
    <link rel="stylesheet" href="../assets/select2/css/chosen.css">
    <script src="../assets/select2/js/select2.full.min.js"></script>
    <script src="../assets/select2/js/chosen.jquery.min.js"></script>

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
                    <div class="row my-3">
                        <div class="col-6">
                            <h4>Receipt Book Destribution</h4>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#issueBook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 446.607 446.607" fill="currentColor" style="enable-background:new 0 0 446.607 446.607;"
                                xml:space="preserve">
                                <path d="M446.607,359.277V207.076H343.061V56.14C239.521,172.777,3.744,207.076,3.744,207.076H0v152.201h0.235v31.19h4.999H27.68
                                    h416.681v-5.734H27.68v-10.162h415.187v-5.306H27.68v-9.988H446.607L446.607,359.277z M439.122,214.557V351.78H33.491
                                    c198.423-28.575,309.569-125.987,309.569-125.987v-11.236H439.122z"/>

                            </svg>
                                Issue New Book
                            </button>
                        </div>
                    </div>
                    
                    <!-- Button trigger modal -->
                    

                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <table class="table table-dark table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Book No.</th>
                                        <th>Issue Date</th>
                                        <th>Issued To.</th>
                                        <th>Start No.</th>
                                        <th>End No.</th>
                                        <th>Issued By</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyBook">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6 col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="issueBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="issueBookLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="issueBookLabel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 446.607 446.607" fill="currentColor" style="enable-background:new 0 0 446.607 446.607;"
                                xml:space="preserve">
                                <path d="M446.607,359.277V207.076H343.061V56.14C239.521,172.777,3.744,207.076,3.744,207.076H0v152.201h0.235v31.19h4.999H27.68
                                    h416.681v-5.734H27.68v-10.162h415.187v-5.306H27.68v-9.988H446.607L446.607,359.277z M439.122,214.557V351.78H33.491
                                    c198.423-28.575,309.569-125.987,309.569-125.987v-11.236H439.122z"/>
                            </svg>
                        Issue New Receipt Book
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <style>
                    .choiceChosen, .productChosen, .chosen-container {
                        width: 100% ;
                        }
                        .chosen-container, .chosen-container-single{
                            width:100% !important;
                        }
                    </style>

                <div class="modal-body">
                    <form id="bookEntry">
                        <div class="container">
                            <div class="row">
                                <div class="mb-3 col-4 text-end">
                                    <label for="rec-book">Book No.</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="number" name="rec-book" id="rec-book" >
                                    <span class="small text-danger d-none">Book No. Required.</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="rec-issue-date">Issue Date</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="date" name="rec-issue-date" id="rec-issue-date" value="<?php echo date('Y-m-d'); ?>">
                                    <span class="small text-danger d-none">Issue Date Required</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="rec-issued-to">Issued To</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <select id="rec-resident-name" name="rec-resident-name" class="choiceChosen" style="width:200px !important;">
                                        <option value="0">Please Choose a Name....</option>
                                        <?php
                                            $sq = "SELECT resident_id, resident_unId, resident_name FROM residents order by resident_name asc";
                                            $res = db::getInstance()->query($sq)->getResults();
                                            foreach($res as $key=> $output):
                                        ?>
                                            <option value="<?php echo $output->resident_id ?>"><?php echo $output->resident_unId." - ".$output->resident_name; ?></option>
                                        <?php endforeach; ?>  
                                    </select>
                                    <span class="small text-danger d-none">Amount Required.</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="rec-start-no">Start No</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="number" name="rec-start-no" id="rec-start-no">
                                    <span class="small text-danger d-none">Start No. Requied</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="rec-end-no">End No.</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="number" name="rec-end-no" id="rec-end-no">
                                    <span class="small text-danger d-none">End No. Required.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="issueBook();">Issue Book</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
        $(function(){
            $(".choiceChosen").chosen({});
            readReceipt();
        });
    </script>
</body>
</html>
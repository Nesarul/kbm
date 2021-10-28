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
                            <h4>Juma Collection</h4>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#jumaEntry">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                                New Entry
                            </button>
                        </div>
                    </div>
                    
                    <!-- Button trigger modal -->
                    

                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="table-responsive-sm">
                                <?php $month = array('January','February','March','April','May','June','July','August','September','October','November','December'); ?>
                                <h5>Collection By Week for the Month of 
                                    <select class="b-bord" style="width:120px;" id="collMonth" name="collMonth"> 
                                        <?php foreach($month as $key => $data): ?>
                                            <option value=<?php echo ++$key; ?>><?php echo $data; ?></option>
                                        <?php endforeach; ?> 
                                    </select> &nbsp; &nbsp;
                                    <input class="b-bord" type="number" name="collYear" id="collYear" value="" style="width:80px"> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-outline-success btn-sm" onClick = "jumaCollMonth();">Go</button>
                                </h5>
                                <table class="table">
                                    <thead><tr><th>Data</th><th>Receipt No.</th><th>Amount</th></tr>
                                    </thead>
                                    <tbody id="tb-collMonth"></tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Grand Total</td>
                                            <td></td>
                                            <td id="mTotal"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        Collection By Month for the Year of <input class="b-bord" type="number" name="collY" id="collY" value="" style="width:80px"> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-outline-success btn-sm" onClick = "jumaCollYear();">Go</button>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb-collYear">
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Grand Total</td>
                                            <td id="yTotal"></td>
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

    
    <!-- Modal -->
    <div class="modal fade" id="jumaEntry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="jumaEntryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jumaEntryLabel">Insert New Entry for Juma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="regEntry">
                        <div class="container">
                            <div class="row">
                                <div class="mb-3 col-4 text-end">
                                    <label for="coll-rec">Receipt No.</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="number" name="coll-rec" id="coll-rec" >
                                    <span class="small text-danger d-none">Receipt No. Required.</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="coll-date">Date</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="date" name="coll-date" id="coll-date" value="<?php echo date('Y-m-d'); ?>">
                                    <span class="small text-danger d-none">Must be Friday.</span>
                                </div>
                                <div class="mb-3 col-4 text-end">
                                    <label for="coll-amount">Amount</label>
                                </div>
                                <div class="mb-3 col-8">
                                    <input class="form-control" type="number" name="coll-amount" id="coll-amount">
                                    <span class="small text-danger d-none">Amount Required.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="registerEntry();">Register Entry</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript">
        $(function(){
            var d = new Date();
            $('#collYear, #collY').val(d.getFullYear());
            $('#collMonth').val(parseInt(d.getMonth()));
            jumaCollMonth();
            jumaCollYear();
        })
    </script>
</body>
</html>
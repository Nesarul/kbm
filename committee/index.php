<?php
    require_once('../admin/db/db.php');
    require_once('../assets/sidebar/sidebarImages.php');
    
    $ttl = db::getInstance()->query('SELECT count(*) as tt FROM `committee`')->getResults();
    $totalRec = $ttl[0]->tt;
    $noPages = 1; 
    $curPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $start = ($curPage-1)*$limit;
    if($totalRec > 10)
        $noPages = ($totalRec / 10) + (($totalRec % 10) > 0 ? 1 : 0);
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
            <div class="row">
                <div class="col-12 text-end py-2">
                <div id="kp"></div>
                    <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Member</button>
                </div>
                <div class="col-12">
                    <div class="responsive-table">
                        <table class="table table-sm">
                            <caption>Residents List</caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Father's Name</th>
                                    <th>Mobile No.</th>
                                    <th>Title</th>
                                    <th>Period From</th>
                                    <th>Period To</th>
                                </tr>
                            </thead>
                            <?php
                                $sq = "SELECT 
                                cl.resident_unId,
                                cl.resident_name,
                                cl.resident_fatherName,
                                cl.resident_status,
                                cl.resident_mobile,
                                com.com_title, 
                                com.com_periodFrom,
                                com.com_periodTo FROM residents AS cl RIGHT JOIN committee AS com ON com.resident_id = cl.resident_unId";
                                $res = db::getInstance()->query($sq)->getResults();
                                foreach($res as $key=> $output):
                            ?>
                            
                            <tr>
                                <td><?php echo $output->resident_unId; ?></td>
                                <td><?php echo $output->resident_name; ?></td>
                                <td><?php echo $output->resident_fatherName; ?></td>
                                <td><?php echo $output->resident_mobile; ?></td>
                                <td><?php echo $output->com_title; ?></td>
                                <td><?php echo $output->com_periodFrom; ?></td>
                                <td><?php echo $output->com_periodTo; ?></td>
                            </tr>
                            <?php endforeach; ?> 

                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm">
                            <?php if($noPages > 5): ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; for ($i = 0; $i < $noPages; $i++): ?>
                                <li class="page-item"><a class="page-link" href="<?php echo('./clients.php?page='.$i+1) ?>"><?php echo $i+1; ?></a></li>
                            <?php endfor; if($noPages > 5): ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>

                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Membert to Committee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="com_id">Dedsignation</label>
                                        <select name="com_id" id="com_id" class="form-control">
                                            <?php
                                                $selResident = db::getInstance()->query('SELECT * FROM `residents`')->getResults();
                                                foreach($selResident as $key => $rec):
                                            ?>
                                                <option value="<?php echo $rec->resident_id; ?>"><?php echo $rec->resident_name; ?> </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <br>
                                        <label for="startDate">Start</label>
                                        <input id="startDate" class="form-control" type="date" />
                                    </div>
                                    <div class="col-6">
                                        <label for="deg">Dedsignation</label>
                                        <input type="text" name="deg" id="deg" class="form-control">

                                        <br>
                                        <label for="endDate">End</label>
                                        <input id="endDate" class="form-control" type="date" />
                                    </div>
                                </div>

                                <br>
                                <button type="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="tpk">Add Commettee Member.</button>
                            </form>
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


        $('#tpk').click(function(){
            var d = new Date();

            var month = d.getMonth()+1;
            var day = d.getDate();

            var output = d.getFullYear() + '/' +
                (month<10 ? '0' : '') + month + '/' +
                (day<10 ? '0' : '') + day;

            var comId = $("#com_id option:selected").val();
            // var comName = $("#com_id option:selected").text();
            var deg = $("#deg").text();
            var startDateVal = $('#startDate').val();
            if(startDateVal === "" ) startDateVal = new Date();
            var endDateVal = $('#endDate').val();
            if(endDateVal === "" ) endDateVal = startDateVal;
            
            $.ajax({
                type:'POST',
                url:'page.php',
                data:{id:comId,deb:deg,sd:startDateVal,ed:endDateVal},
                dataType:'JSON',
                success:function(data){
                    alert(data.firstName);
                }
            });
        });

        
        
    </script>
    <script src="../assets/css/bootstrap/js/bootstrap.bundle.js"></script>t
</body>
</html>
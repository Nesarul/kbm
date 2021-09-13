<?php
    require_once('./admin/functions.php');
    $pageTitle = "Login Page";
    require_once(SITE_ROOT.'inc'.DS.'header.php');
?>
    <link rel="stylesheet" href="./assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://kit.fontawesome.com/6123117173.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 offset-md-4 offset-sm-3 mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-tie"></i> Please Login to continue.</h5>
                    <form class="mt-3" action="./admin/login.php" method="post">
                        <div class="mb-3 row">
                            <label for="userEmail" class="col-sm-5 col-form-label text-end">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="userPassword" class="col-sm-5 col-form-label text-end">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="userPassword"  name="userPassword"required>
                            </div>
                        </div>
                        <div class="text-start mb-0">
                            <p class="alert-danger pl-3"><?php echo isset($_GET['w']) ?"Invalid Password or Email" : null; ?></p>
                            <p class="small"><button type="submit" class="btn btn-outline-primary btn-sm">Submit</button> &nbsp; &nbsp;Do not have Account Pleaed Click <a href="./admin/register.php">Here</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once(SITE_ROOT.'inc'.DS.'footer.php');
?>
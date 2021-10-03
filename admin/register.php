<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <?php
        require_once('./db/db.php');
        $err = [];
        $va = [];
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            foreach($_POST as $key => $value){
                $va[$key] = validate_input($value);
                if($va[$key] == '') $err[$key] = "err";
            }
    
            if($va['userPassword'] != $va['userConfirmPassword']){
                $err['userConfirmPassword'] = "err";
            }
            $em = db::getInstance()->get('users',array('user_email','=',$va['userEmail']))->count();
            if($em > 0 ) $err['email'] = "err";
            
            if(!in_array('err',$err)){
                db::getInstance()->Insert('users',
                    array(
                        'user_name'         => $va['userName'],
                        'user_fatherName'   => $va['userFatherName'],
                        'user_address'      => $va['userAddress'],
                        'user_email'        => $va['userEmail'],
                        'user_password'     => password_hash($va['userPassword'], PASSWORD_ARGON2I),
                        'user_phone'        => $va['userMobileNo']
                    ));
            }
        }
        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 offset-md-1 mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Signup with Khodaibari Jame Mosjid.</h5>
                        <form class="mt-3 w-100" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Name <span class="alert-warning"> <?php if(isset($err['userName'])) echo "Name Required"; ?></span></label>
                                            <input type="text" required class="form-control"id="userName" name="userName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userFatherName" class="form-label">Father's Name <?php if(isset($err['userFatherName'])) echo "Fatyher Name Required"; ?></span></label>
                                            <input type="text" required class="form-control" id="userFatherName" name="userFatherName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userAddress" class="form-label">Address <?php if(isset($err['userAddress'])) echo "Address Required"; ?></span></label>
                                            <input type="text" required class="form-control" id="userAddress" name="userAddress">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email <?php if(isset($err['userEmail'])) echo "Email Required"; ?></span></label>
                                            <input type="email" required class="form-control" id="userEmail" name="userEmail">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="userPassword" name="userPassword">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userConfirmPassword" class="form-label">Confirm Password <?php if(isset($err['userConfirmPasswor'])) echo "Password and confirm password does not match"; ?></span></label>
                                            <input type="password" class="form-control" id="userConfirmPassword" name="userConfirmPassword">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userMobileNo" class="form-label">Mobile No <?php if(isset($err['userMobileNo'])) echo "Mobile No Required"; ?></span></label>
                                            <input type="text" class="form-control" id="userMobileNo" name="userMobileNo">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


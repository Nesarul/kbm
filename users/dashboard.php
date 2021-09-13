<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body style="background-color:orange">
    <style>
        .default{
    margin:0;
    padding:0;
    /* background-color: #02534D; */
    background-color: #f6f6f6;
    box-sizing: border-box;
}
.left-bar{
    max-width:200px;
    position:absolute;
    left:0;
    top:60px;
}
#sidebar {
    width: 200px;
    background: #fff;
    transition: all 0.4s;
    padding:15px;
    box-sizing: border-box;
    -webkit-box-shadow: 1px 1px 8px 1px rgba(0,0,0,0.42); 
    box-shadow: 1px 1px 8px 1px rgba(0,0,0,0.42);
}
.right-bar{
    margin-left:200px;
    transition: all 0.4s;
}
.right-bar-active{
    margin-left:0;
    transition: all 0.4s;
}

a,
a:hover,
a:focus {
  transition: all 0.4s;
}

/* Side Bar */
.wrapper {
  display: flex;
  text-decoration: none;
  transition: all 0.4s;
}

#sidebar.active {
  margin-left: -200px;
}
#sidebar ul li{
  display: block;
  font-size: 36px;
  text-align: center;
}
#sidebar a {
  text-decoration: none;
  color:#6c6c6c;
  padding: 10px;
  font-size: 1.1em;
  display: block;
}
#sidebar span{
  font-size: 14px;
  text-align: center;
  display: block;
  color:inherit;
}
#sidebar a:hover{
  color: #262933;
  background: #f5f5f5;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
  color: #fff;
  background: #1b1d24;
}


#content {
  width: 100%;
  /* padding: 20px; */
  min-width: height 100vh;
  transition: all 0.4s;
}


.main-logo{
  width:90px;
}
.bg-custom{
  background-color: #02534D !important;
  color:white;
}
.nav-link{
  color:aliceblue !important;
}

/* Icons */
.bg-f6{
  background-color: #f6f6f6;
}
.ico-img img{
  max-width:135px;
}
.nf{
  background-color: #fff;
  max-height: 400px;
  overflow-y: scroll;
}
.nf>h3{
  position: relative;
  display: flex;
  padding:10px 0px;
  width:calc(100% - 25px);
}
.nf>h3::after{
  position: absolute;
  right:-25px;
  content: '';
  width:20px;
  height:20px;
  background-size: 100% 100%  ;
  background-image: url('../../images/pencil.png'  );
}
.sb-icon{
  width:52px;
}
    </style>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-custom">
                    <div class="container-fluid">
                        <a href="#"><img class="main-logo" src='../assets/images/main-logo.png' alt="Main Logo" /></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <Link to="#" class="nav-link" onClick={ setSideBar }><img src="../assets/images/bar.png" alt="Bar Menu" /></Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>                        
            </div>
        </div>
    </div>

    <div class="left-bar">
        <nav id="sidebar">
            <ul class="list-unstyled">
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
                <li><a href="#"><i class="fas fa-home"></i> <span>home</span></a></li>
            </ul>
        </nav>
    </div>
    <div class="right-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mb-5">
                    <img src="../assets/images/banner.jpg" alt="Banner" class="w-100" />
                </div>
            </div>
        </div>
    
        <div class="container-fluid">
            <div class="row bg-f6 mb-5">
                <div class="col-7">
                    <div class="row ico-img">
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_files.png" alt="icon" class="w-100" />
                        </div>
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_getting_notext.png" alt="icon" class="w-100" />
                        </div>
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_meetings.png" alt="icon" class="w-100" />
                        </div>
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_org_settings.png" alt="icon" class="w-100" />
                        </div>
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_projects.png" alt="icon" class="w-100" />
                        </div>
                        <div class="col-4 text-center">
                            <img src="../assets/images/icon_projects.png" alt="icon" class="w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col nf p-3 border shadow">
                            <h3>News Feed Here</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique neque labore sit excepturi accusantium eos quidem optio at perspiciatis corporis nihil obcaecati cupiditate cum ducimus dolorum, ipsam velit nisi dolor?</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi molestiae illo odio, dolor sint corrupti maxime animi debitis voluptates incidunt blanditiis aliquam repellendus omnis at natus optio non culpa iusto?</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam dolorum officia harum aperiam totam dicta rem aspernatur pariatur a quidem fuga tempore sint, assumenda eos corporis repellat temporibus unde? Laboriosam.</p>
                            <p>We have joy we have fun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</body>
</html>
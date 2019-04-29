
<?php session_start() ?>
<!DOCTYPEhtml>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body>
<script src="js/jquery-3.3.1.min.js"> </script>
<script src="bootstrap/js/bootstrap.min.js"> </script>
<script src="js/all.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<?php
if($_SESSION["ID"]!=null){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marvel_database";
//Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($_SERVER['REQUEST_METHOD']=="GET"){
       $profile_id = $_SESSION["ID"];

    }else{
        $profile_id=$_POST["profile_id"];
    }


// Check connection
    if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql ="use marvel_database";
if($conn->query($sql)===TRUE){
$stmt = $conn->prepare("select user_name from marvel_users_auth Where user_id=? ");
$stmt->bind_param("s",$profile_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

$stmt = $conn->prepare("Select  first_name,middle_name,last_name,img_url,id_no,alternative_email,phone_no,county,region,area,description,religion,location,role
 from marvel_clergy where owner_id=?");
$stmt->bind_param("s",$profile_id);
$stmt->execute();
$stmt->bind_result($fist_name,$middle_name,$last_name,$img_url,$id_number,$alternative_email,$phone_no,$county,$region,$area,$description,$religion,$location,$role);
$stmt->fetch();



}


}else{


header("Location:index.php");

}



?>



<nav class="navbar navbar-expand-lg all-color-primary navbar-dark">
    <a class="navbar-brand" href="#"> <img src="images/happy1.jpeg" width="50" height="50">Marvel Donations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="requesterHome.php"> <b class="fa fa-home"></b>Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="myrequest.php"><b class="fa fa-user-friends"></b>My Requests</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="selector.php"><b class="fa fa-user-friends"></b>Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="fa fa-mail-bulk"></b>Messaging
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <b class="fa fa-dove"></b></b>About</a>
            </li>
        </ul>
        <form class="form-inline mr-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a href="#" role="button" class="btn btn-success mr-5">Request</a>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLogout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa fa-user-circle"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogout">
                <a class="dropdown-item" href="#">LogOut</a>
                <a class="dropdown-item" href="#">Setting</a>

            </div>
        </li>
    </div>
</nav>
<div  class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8 justify-content-center">
        <button class="btn btn-outline-success  float-right" data-toggle="popover"
        title="verification" data-content="complete profile to verify account" data-placement="left">Verified</button>
        </div>
        <div class="w-100"></div>
        <div class="col-4  justify-content-center">
            <div class="justify-content-center d-flex">
            <img src="<?php echo $img_url;?>" class="rounded rounded-circle img mt-5 shadow-lg" width="300" height="300">
            </div>


        </div>
        <div class="mt-5 col-12" ><h1  class="text-info text-center"><?php echo $username;?></h1></div>
        <hr>

    </div>
    <div class="row mt-5 justify-content-center">
        <form class="col-sm-12 col-md-10 col-lg-9 col-xl-8 align-self-center" action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" enctype="multipart/form-data">
           <div class="row align-items-center">
<!--            <div class="custom-file mt-1  col-4 offset-4 ">-->
<!--                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>-->
<!--                <label class="custom-file-label" for="customFile">Choose a profile image to upload</label>-->
<!--            </div>-->
           </div>
        <div class="row justify-content-around">
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">First Name</label>
                    <input class="form-control " type="text" value="<?php echo $fist_name;?>" required name="first_name">
                </div>
            </div>
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Middle Name</label>
                    <input class="form-control" type="text" value="<?php echo $middle_name;?>" required name="middle_name">
                </div>
            </div>
            <div class="col-sm-11 col-md-11 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Last Name</label>
                    <input class="form-control" type="text" value="<?php echo $last_name;?>" required name="last_name">
                </div>
            </div>

        </div>
        <div class="row justify-content-around">
            <div class="col-md-4 col-sm-11 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="col-form-label form-text">Id Number</label>
                    <input class="form-control" type="number" value="<?php echo $id_number;?>" required name="id_no">
                </div>

            </div>
            <div class="col-md-6 col-sm-11 col-lg-6 col-xl-6">
                <div class="form-group ">
                    <label class="col-form-label form-text">Alternative Email</label>
                    <input class="form-control align-self-end" value="<?php echo $alternative_email;?>" type="email" name="alternative_email">
                </div>
            </div>
        </div>
        <div class="row justify-content-around mb-3">
            <div class="col-md-5 col-lg-4 col-xl-4 col-sm-11">
                <div class="form-group">
                    <label class="col-form-label form-text">Phone no</label>
                    <input class="form-control" type="number" value="<?php echo $phone_no;?>" required name="phone_no">
                </div>

            </div>
            <div class="col-6">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">County</label>
                    <input class="form-control " type="text" value="<?php echo $county;?>" required name="county">
                </div>
            </div>
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Region</label>
                    <input class="form-control" type="text" value="<?php echo $region;?>" required name="region">
                </div>
            </div>
            <div class="col-sm-11 col-md-11 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Area</label>
                    <input class="form-control" type="text" value="<?php echo $area;?>" required name="area">
                </div>
            </div>

        </div>
            <div class="row justify-content-around">
                <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label class="col-form-label form-text">Religion</label>
                        <input class="form-control " type="text" value="<?php echo $religion;?>" required name="religion">
                    </div>
                </div>
                <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label class="col-form-label form-text">Church Location</label>
                        <input class="form-control" type="text" value="<?php echo $location;?>" required name="location">
                    </div>
                </div>
                <div class="col-sm-11 col-md-11 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label class="col-form-label form-text">Role</label>
                        <input class="form-control" type="text" value="<?php echo $role;?>" name="role" required>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                <h4 class="form-text text-center">Description</h4>
                </div>
                <div class="col-10">
                <textarea class="form-control align-self-center" value="<?php echo $description;?>" name="description">

                </textarea>
                </div>

            </div>
<!--            <div class="row mt-5 mb-5 justify-content-center">-->
<!--                <input type="submit" name="submit" value="save" class="btn btn-success">-->
<!---->
<!--            </div>-->



        </form>


    </div>


</div>

</body>
</html>
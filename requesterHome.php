<?php session_start() ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<?php
if($_SESSION["ID"]!=null){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marvel_database";
//Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql ="use marvel_database";
if($conn->query($sql)===TRUE){
$stmt = $conn->prepare("select user_name from marvel_users_auth Where user_id=? ");
$stmt->bind_param("s",$_SESSION['ID']);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
if($username!=null && $_SERVER["REQUEST_METHOD"]=="POST"){
$title = $_POST["title"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];
$description = $_POST["description"];
$img_url = "ddd";

$stmt = $conn->prepare("insert into marvel_request_table (title,img_url,category,quantity,description,owner_id)
values (?,?,?,?,?,?)");
$stmt->bind_param("sssiss",$title,$img_url,$category,$quantity,$description,$_SESSION["ID"]);
if($stmt->execute()){
header("Location:verify.php");


}else{
echo $stmt->error;
}










}elseif ($username!=null){




}else{
header("Location:index.php");

}







}else{
echo "connection error".$conn->error;
}

}else{


header("Location:index.php");
}



?>

<body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
<script src="fontawesome/js/all.min.js"></script>
<script src="js/nicEdit.js"></script>

<nav class="navbar navbar-expand-lg all-color-primary navbar-dark">
    <a class="navbar-brand" href="#"> <img src="images/happy1.jpeg" width="50" height="50">Marvel Donations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <b class="fa fa-home"></b>Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><b class="fa fa-user-friends"></b>Profile</a>
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
        <button  role="button" class="btn btn-success mr-5" data-target="#exampleModal" data-toggle="modal">Request</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header all-color-primary">
                        <h5 class="modal-title" id="exampleModalLabel">Mnoma</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <form style="color:black " class="container-fluid" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="modal-body">
                        <div class="w-100">
                            <img class="img-fluid" src="images/happy1.jpeg" height="200px">
                             <hr>
                            <div class="custom-file mt-1">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <hr>
                            <div class="form-group mt-1">
                                <label >Request Title</label>
                                <input type="text" name="title" class="form-control"   placeholder="eg Request for pads">
                            </div>
                            <div class="form-group mt-1" name="category">
                                <label >Request Category</label>
                                <select class="custom-select" name="category">
                                    <option value="sanitary_pads">Sanitary Towels</option>
                                    <option value="underpants">Under Pants</option>

                                </select>
                                <small  class="form-text text-muted">select an option above.</small>

                            </div>
                            <div class="form-group mt-1">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="quantity"  placeholder="eg 10000">
                                <small  class="form-text text-muted">A rough estimation of the number required.</small>
                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <h4 class="form-text text-center">Description</h4>
                                </div>
                                <div class="col-10 d-inline-block">
                                <textarea class="form-control align-self-center w-100" required name="description">

                                </textarea>
                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
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
<script>
     bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</body>
</html>
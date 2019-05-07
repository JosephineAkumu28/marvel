

<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/nicEdit.js"></script>
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

//fetch requests
if($username!=null && $_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST["title"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];
    $process = $_POST["process"];
    $img_url = "ddd";
    $target_dir = "uploads/";
    $target_file = $target_dir.rand(0,100000). basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("insert into marvel_donation_table (title,img_url,category,quantity,description,request_process,owner_id)
values (?,?,?,?,?,?,?)");
            $stmt->bind_param("sssisss",$title,$target_file,$category,$quantity,$description,$process,$_SESSION["ID"]);
            if($stmt->execute()){
                header("Location:mydonations.php");


            }else{
                echo $stmt->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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



<nav class="navbar navbar-expand-lg all-color-primary navbar-dark">
    <a class="navbar-brand" href="#"> <img src="images/happy1.jpeg" width="50" height="50">Marvel Donations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="donorHome.php"> <b class="fa fa-home"></b>Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="mydonations.php"><b class="fa fa-user-friends"></b>My Donations</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="selectorView.php"><b class="fa fa-user-friends"></b>Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <b class="fa fa-dove"></b></b>About</a>
            </li>
        </ul>
        <form class="form-inline mr-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <button  role="button" class="btn btn-success mr-5" data-target="#exampleModal" data-toggle="modal">Donate</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header all-color-primary">
                        <h5 class="modal-title" id="exampleModalLabel">Mnoma</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <form style="color:black" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">
                            <div class="w-100 align-items-center">
                                <img  src="images/happy1.jpeg" height="100px">
                                <hr>
                                <div class="custom-file mt-1">
                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <hr>
                                <div class="form-group mt-1">
                                    <label >Donation Title</label>
                                    <input type="text" class="form-control" name="title" required   placeholder="eg Pads donation">
                                </div>
                                <div class="form-group mt-1" name="category">
                                    <label >Request Category</label>
                                    <select class="custom-select" name="category" required>
                                        <option value="sanitary_pads">Sanitary Towels</option>
                                        <option value="underpants">Under Pants</option>

                                    </select>
                                    <small  class="form-text text-muted">select an option above.</small>

                                </div>
                                <div class="form-group mt-1">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" required   placeholder="eg 10000">
                                    <small  class="form-text text-muted">A rough estimation of the number required.</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                <textarea class="form-control align-self-center w-100" required name="description">

                                </textarea>
                                </div>
                                <hr>
                                <div class="form-group"><label >Application  Procedure</label>
                                <textarea class="form-control align-self-center w-100" required name="process">

                                </textarea>
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
                <a class="dropdown-item" href="logout.php">LogOut</a>

            </div>
        </li>
    </div>
</nav>
<div class="container">

    <?php
    $stmt = $conn->prepare("select * from marvel_donation_table where owner_id=?");
    $stmt->bind_param("s",$_SESSION["ID"]);
    if($stmt->execute()){
            $stmt->bind_result($id,$title,$img_url,$category,$quantity,$description,$procces,$date,$owner_id);
            while ($stmt->fetch()) {

                $p= strpos($description,"<div>");
                $shot;
                if($p==false){
                    $shot = substr($description,0,30).".....";

                }else{
                    strpos($description,"<div>");
                    if($p<33)
                        $shot = substr($description,0,$p-3)."......";
                    else{
                        $shot = substr($description,0,30).".....";
                    }

                }


                echo '
        <div class="row  mt-3 ">
        <div class="col-12 bg-light mt-2 ">
            <div class="row">
                <div class="col-4 p-0">
                    <img src="' . $img_url . '"  height="150px">

                </div>
                <div class="col-8">
                    <div class="row justify-content-between p-1">
                        <h5>' . $title . '</h5>
                        <small class="small text-muted"><span class="text-info">Donation date:</span>' . $date . '</small>
                    </div>
                    <div class="row p-1 mt-0">
                        <strong>
                            Description

                        </strong>
                    </div>
                    <div class="row">
                        '.$shot.'

                    </div>
                    <div class="row al align-content-end">
                        <div class="col-10"></div>
                        <div class="col-2">
                        <form class="form-inline" action="deleteDonation.php" method="post" enctype="multipart/form-data">
                            <input class="d-none" name="donation_id" value="'.$id.'">
                            <input class="btn btn-outline-danger" type="submit"  value="Delete">
                         </form>
                        </div>


                    </div>



                </div>



            </div>
                </div>


    </div>

            ';


            }
    }else{
        echo $stmt->error;
    }










    ?>


</div>






<script>
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</body>
</html>
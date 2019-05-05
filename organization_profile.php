<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<script src="js/all.js"></script>
<script src="fontawesome/js/all.min.js"></script>
<script src="js/nicEdit.js"></script>
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
            $fist_name = $_POST["first_name"];
            $middle_name=  $_POST["middle_name"];
            $last_name =  $_POST["last_name"];
            $alternative_email = $_POST["alternative_email"];
            $phone_no =  $_POST["phone_no"];
//            $county =  $_POST["county"];
//            $region =  $_POST["region"];
//            $area =  $_POST["area"];
//            $description = $_POST["description"];
          $organization_name = $_POST["org_name"];
          $portal = $_POST["portal_name"];
          $address = $_POST["address"];

            $target_dir = "uploads/";
            $target_file = $target_dir . rand(0,1000000).basename($_FILES["fileToUpload"]["name"]);
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
                    $stmt = $conn->prepare("insert into marvel_organization_profile (org_name,portal,address,first_name,middle_name,last_name,phone,alternative_email,img_url,owner_id)
 values (?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssisss",$organization_name,$portal,$address,$fist_name,$middle_name,$last_name,$phone_no,$alternative_email,$target_file,$_SESSION["ID"]);
                    if($stmt->execute()){
                        header("Location:verification.php");


                    }else{
                        echo $stmt->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }












        }elseif($username!=null){




        }else{
            header("Location:index.php");
        }







    }else{
        echo "connection error".$conn->error;
    }

}else{


//header("Location:index.php");
}



?>


<nav class="navbar navbar-expand-lg all-color-primary navbar-dark">
    <a class="navbar-brand" href="#"> <img src="images/happy1.jpeg" width="50" height="50">Marvel Donations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</nav>
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8 justify-content-center">
            <button class="btn btn-outline-danger  float-right" data-toggle="popover"
                    title="verification" data-content="complete profile to verify account" data-placement="left">
                Not Verified</button>
        </div>
        <div class="w-100"></div>
        <div class="col-6  justify-content-center">
            <div class="justify-content-start d-flex">
                <img src="images/add_image.png" class="mt-5 shadow-lg mr-1  " width="200" height="100">

                <p class="mt-5 ml-2">
                   + Add your organization logo here
                </p>
            </div>
            <div>


            </div>


        </div>
        <div class="mt-5 col-12" ><h1  class="text-info text-center">you@example.com</h1></div>
        <hr>

    </div>
    <div class="row mt-5 justify-content-center">
        <form class="col-sm-12 col-md-10 col-lg-9 col-xl-8 align-self-center" action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" enctype="multipart/form-data">

        <div class="row align-items-center">
            <div class="custom-file mt-1  col-4 offset-4 ">
                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
                <label class="custom-file-label" for="customFile">Choose a profile image to upload</label>
            </div>
        </div>

        <div class="row justify-content-around">
            <div class="col-12">
                <span class="fa fa-person-booth"></span>
                <p class="text-center all-color-primary">
                    <span class="fa fa-old-republic"></span> Organization info

                <p>



            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="col-form-label form-text">Organization Name</label>
                    <input class="form-control " type="text" required name="org_name">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="col-form-label form-text">Portal Name</label>
                    <input class="form-control " type="text" required name="portal_name">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="col-form-label form-text">Organization address</label>
                    <input class="form-control " type="text" required name="address">
                </div>
            </div>
            <div class="col-12">

               <p class="text-center all-color-primary">
                   <span class="fa fa-person-booth"></span> Key contact person

                <p>



            </div>
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">First Name</label>
                    <input class="form-control " type="text" required name="first_name">
                </div>
            </div>
            <div class="col-sm-11 col-md-5 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Middle Name</label>
                    <input class="form-control" type="text" required name="middle_name">
                </div>
            </div>
            <div class="col-sm-11 col-md-11 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="col-form-label form-text">Last Name</label>
                    <input class="form-control" type="text" required name="last_name">
                </div>
            </div>

        </div>
        <div class="row justify-content-around mb-3">
            <div class="col-md-5 col-lg-4 col-xl-4 col-sm-11">
                <div class="form-group">
                    <label class="col-form-label form-text">Phone no</label>
                    <input class="form-control" type="number" required name="phone_no">
                </div>

            </div>
            <div class="col-6">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="form-group ">
                    <label class="col-form-label form-text">Alternative Email</label>
                    <input class="form-control align-self-end" type="email" name="alternative_email">

                </div>

            </div>

        </div>

        <div class="row mt-5 mb-5 justify-content-center">
            <input type="submit" name="submit" value="save" class="btn btn-success">

        </div>
    </div>



    </form>


</div>


</div>






</div>
<script>
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script
</body>
</html>
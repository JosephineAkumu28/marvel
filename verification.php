<?php
session_start();
?>

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

            $target_dir = "uploads/";
            $target_file = $target_dir .rand(0,1000000). basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if($imageFileType != "7z" && $imageFileType != "zip" && $imageFileType != "Rar"
                ) {
                echo "Sorry, only 7z, zip, Rar  files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    $stmt = $conn->prepare("insert into marvel_verification(user_id,file_path,verification_status,user_name)values (?,?,?,?)");
                    $status="PENDING";
                    $stmt->bind_param("ssss",$_SESSION["ID"],$target_file,$status,$username);
                    if($stmt->execute()){
                        header("Location:Waiting.html");



                    }else{
                        echo $stmt->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }












        }elseif($username!=null){


            echo "here";

        }else{
            header("Location:index.php");
            echo "here";
        }







    }else{
        echo "connection error".$conn->error;
    }

}else{


    header("Location:index.php");
    echo "here";
}



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

<div class="container mt-5">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marvel_database";


    if($_SESSION["ID"]!=null){
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql ="use marvel_database";
        if($conn->query($sql)===TRUE) {

            $stmt = $conn->prepare("select user_category from marvel_users_auth where user_id=? ");
            $stmt->bind_param("s", $_SESSION["ID"]);
            $stmt->execute();
            $stmt->bind_result($user_category);
            echo $user_category;
            $stmt->fetch();
            if ($user_category != null) {

                switch ($user_category) {
                    case "NGO":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">NGO!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "church":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">CHURCH!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "self_help":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">SELF_HELP!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "well_wisher":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">WELL WISHER!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                     case "others":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">OTHERS!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "GOK" :
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">GOK OFFICIAL!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "children_homes":
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\">CHILDREN HOMES!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    case "clergy" :
                        echo " <div class=\"alert alert-success\" role=\"alert\">
                                <h4 class=\"alert-heading\"> ClERGY!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                <hr>
                                <p class=\"mb-0\">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                </div>
                                 ";
                        break;
                    default:

                        break;
                };
            }


            $stmt->close();
            $conn->close();
        }
    }else{
        header("Location:index.php");
    }
    ?>

    <form class="col-sm-12 col-md-10 col-lg-9 col-xl-8 align-self-center" action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" enctype="multipart/form-data">
        <div class="row align-items-center mt-5">
            <div class="custom-file mt-1  col-8 offset-2 ">
                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
                <label class="custom-file-label" for="customFile">Choose a zip file to upload</label>
            </div>
        </div>
        <div class="row mt-5 mb-5 justify-content-center">
            <input type="submit" name="submit" value="save" class="btn btn-success">

        </div>
    </form>




</div>



</body>
</html>

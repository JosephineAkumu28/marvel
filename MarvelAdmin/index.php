
<?php
session_start();
$user_error="";
?>


<!DOCTYPEhtml>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marvel_database";
$user_name=$_POST['email'];
$password_one=$_POST['password'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql ="use marvel_database";
if($conn->query($sql)===TRUE){

// prepare and bind
$stmt = $conn->prepare("SELECT id,user_name,password FROM marvel_admin where user_name=? and password=?");
$stmt->bind_param("ss", $user_name,$password_one);
 $stmt->execute();
 $stmt->bind_result($user_id,$user_name,$password);
 $stmt->fetch();


 if($user_id!=null){
     $_SESSION["Admin_ID"] = $user_id;

      header("Location:penedingrequest.php");



}else{

    $user_error='<div class="alert alert-danger alert-dismissible fade show w-100">Wrong username
                       or Password
                        <button class="close" role="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>';
     echo $user_error;

}
    $stmt->close();
    $conn->close();


 }
  
// set parameters and execute

else{
echo $conn->error;
}

}
?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

</head>
<body>
<script src="js/jquery-3.3.1.min.js"> </script>
<script src="bootstrap/js/bootstrap.min.js"> </script>

<div class="container">
    <div class="row  d-flex justify-content-center">


        <div class="mt-5 col-sm-10 col-md-7 col-lg-5 col-xl-4">
            <div class="card shadow-lg mt-5 ">

                <form method="post" enctype="multipart/form-data"   action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                <div class="card-body">
                    <h4 class="card-title ">LOG IN</h4>
                        <div class="form-group">
                            <label class="col-form-label form-text">User Name</label>
                            <input class="form-control" type="email" name="email" required>


                        </div>
                        <div class="form-group">
                            <label class="col-form-label form-text" >Password</label>
                            <input class="form-control" type="password" name="password" required>

                        </div>

                    
                </div>
                <div class="row justify-content-around mb-5">
                    <button class="btn btn-info" type="submit" >log in</button>

                </div>
                    </form>



            </div>



        </div>
        <!--<div class="col-lg-4 col-md-3 col-sm-2 col-12 col-xl-5">-->

        <!--</div>-->

    </div>




</div>


</body>
</html>
<!DOCTYPE>
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

    <div class="row justify-content-center mt-5">
        <div class="col-11 shadow-lg ">
            <div class="row justify-content-between">
                <div class="col-12 mb-2 mt-2" >
                    <h4 class="text-center" >SIGN UP</h4>
                </div>
                <div class="col-6" style="background-color: green">
                    <img src="images/happy1.jpeg" class="img-fluid">

                </div>
                <div class="col-5 align-content-center mr-4">
                    <h4 class="text-secondary" >Create Account</h4>
                    <hr>

                    <div class="alert alert-info alert-dismissible fade show w-100">Please select a type of user below
                        <button class="close" role="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>


                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#user_tab" data-toggle="pill" id="user_pill" aria-controls="user_tab" aria-selected="true">user</a></li>
                        <li class="nav-item"><a class="nav-link" id="donor_pill" aria-controls="donor_tab" data-toggle="pill" href="#donor_tab">Donor</a></li>
                    </ul>

                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="user_tab" role="tabpanel" aria-labelledby="user_pill">
                        <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label class="col-form-label form-text">Email</label>
                                <input class="form-control" type="email" name="email" required placeholder="eg you@example.com">


                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >Password</label>
                                <input class="form-control" type="password" name="password_one">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >Confirm Password</label>
                                <input class="form-control" type="password_one" name="password_two">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >User Type</label>
                                <select class="form-control" name="use_type">
                                    <option>Self help-Group</option>
                                    <option>Government officials eg chiefs</option>
                                    <option>Clergy</option>
                                    <option>Children Homes</option>
                                    <option>Others eg headmasters,principals</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-success mt-5 w-50" type="submit" value="Create" name="submit">

                            </div>




                         </form>
                    </div>

                    <div class="tab-pane fade show" id="donor_tab" role="tabpanel" aria-labelledby="donor_pill">
                        <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label class="col-form-label form-text">Email</label>
                                <input class="form-control" type="email"  name="email" required placeholder="eg you@example.com">


                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >Password</label>
                                <input class="form-control" type="password" name="password_one">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >Confirm Password</label>
                                <input class="form-control" type="password" name="password_two">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label form-text" >Donor Type</label>
                                <select class="form-control" name="user_type">
                                    <option>Self help-Group</option>
                                    <option>NGO,s</option>
                                    <option>Church</option>
                                    <option>Well Wisher</option>
                                    <option>Others</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-success mt-5 w-50" type="submit" value="Create" name="Create_Donor">

                            </div>




                        </form>
                    </div>
                    </div>
            </div>

            </div>
            </div>




    </div>
</div>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marvel_database";
$user_name=$_POST['email'];
$password_one=$_POST['password_one'];
$password_two=$_POST['password_two'];
$user_type="fuck_you";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql ="use marvel_database";
if($conn->query($sql)===TRUE){

// prepare and bind
$stmt = $conn->prepare("INSERT INTO marvel_users_auth (user_name, user_password, user_type,user_id) VALUES (?, ?, ?, ?)");
$pass_to_store = password_hash($password_one,PASSWORD_DEFAULT);
$user_id = md5($user_name);
$stmt->bind_param("ssss", $user_name, $pass_to_store, $user_type,$user_id);
$stmt->execute();

// set parameters and execute


$stmt->close();
$conn->close();
}else{
echo $conn->error;
}

}
?>

</body>
</html>
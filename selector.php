<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marvel_database";


if(!$_SESSION["ID"]==null){
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
            $_SESSION["ID"] = $user_id;

            switch ($user_category) {
                case "NGO":
                    header("Location:othersProfile.htm");
                    break;
                case "church":
                    header("Location:othersProfile.htm");
                    break;
                case "self_help":
                    header("Location:othersProfile.htm");
                    break;
                case "well_wisher":
                    header("Location:wellWisherprofile.php");
                    break;
                case "others":
                    header("Location:othersProfile.php");
                    break;
                case "GOK" :
                    header("Location:govermentofficialProfile.php");
                    break;
                case "children_homes":
                    header("Location:othersProfile.htm");
                    break;
                case "clergy" :
                    header("Location:clergyprofile.php");
                    break;
                default:
                    header("Location:index.php");
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

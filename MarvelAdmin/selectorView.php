<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marvel_database";

$_SESSION["ID"] = $_POST["id"];


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

        $stmt->fetch();
        $stmt->close();
        if ($user_category != null) {

            switch ($user_category) {
                case "NGO":
                    $stmt = $conn->prepare("select owner_id from marvel_organization_profile where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:organization_profileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();
                case "church":
                    $stmt = $conn->prepare("select owner_id from marvel_organization_profile where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:organization_profileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();

                    break;
                case "self_help":
                    $stmt = $conn->prepare("select owner_id from marvel_organization_profile where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:organization_profileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();

                    break;
                case "well_wisher":
                    $stmt = $conn->prepare("select owner_id from marvel_well_wishers where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:wellWisherprofileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();

                    break;
                case "others":
                    $stmt = $conn->prepare("select owner_id from marvel_others_profile where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:othersProfileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();

                    break;
                case "GOK" :
                    $stmt = $conn->prepare("select owner_id from  government_officials where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:govermentofficialProfileView.php");
                    }else {
                        header("Location:noprofile.php");
                    }
                    $stmt->close();

                    break;
                case "children_homes":
                    $stmt = $conn->prepare("select owner_id from  marvel_organization_profile where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    echo $stmt->num_rows();
                    if($userid!=null){
                        header("Location:organization_profileView.php");
                    }else {
                        header("Location:verification.php");
                    }
                    $stmt->close();

                    break;
                case "clergy" :
                    $stmt = $conn->prepare("select owner_id from marvel_clergy where owner_id=? ");
                    $stmt->bind_param("s", $_SESSION["ID"]);
                    $stmt->execute();
                    $stmt->bind_result($userid);
                    $stmt->fetch();
                    if($userid!=null){
                        header("Location:clergyprofileView.php");
                    }else {
                        header("Location:verification.php");
                    }
                    $stmt->close();
                    break;
                default:
                    header("Location:noprofile.php");
                    break;
            };
        }


    $conn->close();
}
}else{
    header("Location:index.php");
}
?>

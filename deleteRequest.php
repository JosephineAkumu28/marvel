<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Btech
 * Date: 27/04/2019
 * Time: 22:50
 */

if($_SESSION["ID"]!=null){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marvel_database";
    $request_id = $_POST["request_id"];
//Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql ="use marvel_database";
    if($conn->query($sql)===TRUE){

        $stmt = $conn->prepare("DELETE FROM marvel_request_table WHERE entry_id=?");
        $stmt->bind_param("s",$request_id);
        $stmt->execute();
        header("Location:myRequest.php");

    }
}

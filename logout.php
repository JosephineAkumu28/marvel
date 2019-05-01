<?php
/**
 * Created by PhpStorm.
 * User: Btech
 * Date: 30/04/2019
 * Time: 10:30
 */
session_start();

session_destroy();
header("Location:index.php");
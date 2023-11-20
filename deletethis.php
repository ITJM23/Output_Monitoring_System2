<?php

    session_start();

    include "../includes/db.php";
    include "../includes/functions.php";

    date_default_timezone_set("Asia/Manila");

    $current_hour = date('H', strtotime("now"));

    
    if(isset($_COOKIE['OMS_line_Id'])){

        $line_Id = $_COOKIE['OMS_line_Id'];
    }

    // else{

    //     $line_Id = "";

    // }
    echo "Line_Id: " . $line_Id;

   ?>
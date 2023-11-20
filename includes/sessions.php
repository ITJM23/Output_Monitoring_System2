<?php

    if(!isset($_COOKIE['OMS_line_Id'])){

        echo "<script>location.href='login.php';</script>";
    }

    else{

        $line_Id    = $_COOKIE['OMS_line_Id'];
        $line_name  = $_COOKIE['OMS_line_name'];
    }

    // else if($_COOKIE['CMS_usr_Id'] == '' || $_COOKIE['CMS_usr_Id'] == null){

    //     echo "<script>location.href='../users/login.php';</script>";
    // }

    // else{

    //     if($_COOKIE['CMS_usr_Id'] == '' || $_COOKIE['CMS_usr_Id'] == null){

    //         echo "<script>location.href='../login.php';</script>";
    //     }
    // }

?>
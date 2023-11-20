<?php

    if(!isset($_COOKIE['OMS_admin_Id'])){

        echo "<script>location.href='login.php';</script>";
    }

    else{

        $admin_Id    = $_COOKIE['OMS_admin_Id'];
        $usr_lvl_Id  = $_COOKIE['OMS_user_lvl'];
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
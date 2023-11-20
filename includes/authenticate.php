<?php

    if(isset($_COOKIE['OMS_line_Id'])){

        // if($_COOKIE['OMS_line_Id'] == 1){

            echo "<script>location.href='index.php';</script>";
        // }
    }

    else if(isset($_COOKIE['OMS_admin_Id'])){

        echo "<script>location.href='dashboard.php';</script>";
    }

    // else{

    //     echo "<script>location.href='login.php';</script>";
    // }
    
?>
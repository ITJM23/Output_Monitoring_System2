<?php

    // session_start();

    error_reporting(0);
    
    session_destroy();

    if( isset($_COOKIE['OMS_line_Id']) || isset($_COOKIE['OMS_admin_Id']) ){

        setcookie("OMS_line_Id", $_COOKIE['OMS_line_Id'], time()-3600 * 24 * 365, '/');
        // setcookie("OMS_lineout_Id", $_COOKIE['OMS_lineout_Id'], time()-3600 * 24 * 365, '/');
        setcookie("OMS_admin_Id", $_COOKIE['OMS_admin_Id'], time()-3600 * 24 * 365, '/');
    
        echo "<script>location.href='../login.php';</script>";

    }
    

?>
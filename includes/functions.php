<?php

    function confirmQuery($string){

        global $con;

        if(!$string){

            die("ERROR" . mysqli_error($con));
        }
    }

    function escape($string){

        global $con;

        return mysqli_real_escape_string($con, trim($string));

    }

?>
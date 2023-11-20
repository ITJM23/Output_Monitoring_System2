<?php

    session_start();

    include "../includes/db.php";
    include "../includes/functions.php";

    date_default_timezone_set("Asia/Manila");

    $current_hour = date('H', strtotime("now"));

    
    if(isset($_COOKIE['OMS_line_Id'])){

        $line_Id = $_COOKIE['OMS_line_Id'];
        $line_name  = $_COOKIE['OMS_line_name'];
        //line ID starts at zero
    }

    // else{

    //     $line_Id = "";

    // }


    if(isset($_POST['action'])){

        //jm updatelinestatus

        if($_POST['action'] == 'normal'){
            // SQL query
            $query = "UPDATE graph_status_table SET graph_display = 'normal' WHERE Line_name = $line_name";
    
            $insert = mysqli_query($con, $query);
            
    
    
            if($insert){
    
                echo json_encode('1');
            }
        }



        if($_POST['action'] == 'BREAKTIME'){
        // SQL query
        $query = "UPDATE graph_status_table SET graph_display = 'BREAKTIME' WHERE Line_name = $line_name";

        $insert = mysqli_query($con, $query);
        
        $remarks = $_POST['remarks'];
        $query2 = "UPDATE graph_status_table SET remarks = ? WHERE Line_name = ?";
        $stmt2 = mysqli_prepare($con, $query2);
        mysqli_stmt_bind_param($stmt2, "ss", $remarks, $line_name);
        $insert2 = mysqli_stmt_execute($stmt2);


        if($insert2){

            echo json_encode('1');
        }
        }


        if($_POST['action'] == 'LINE_STOP'){
            // SQL query
            $query = "UPDATE graph_status_table SET graph_display = 'LINE_STOP' WHERE Line_name = $line_name";
    
            $insert = mysqli_query($con, $query);

            $remarks = $_POST['remarks'];
            $query2 = "UPDATE graph_status_table SET remarks = ? WHERE Line_name = ?";
            $stmt2 = mysqli_prepare($con, $query2);
            mysqli_stmt_bind_param($stmt2, "ss", $remarks, $line_name);
            $insert2 = mysqli_stmt_execute($stmt2);
    
            if($insert){
    
                echo json_encode('1');
            }
        }

        if($_POST['action'] == 'NO_PRODUCTION'){
            // SQL query
            $query = "UPDATE graph_status_table SET graph_display = 'NO_PRODUCTION' WHERE Line_name = $line_name";
    
            $insert = mysqli_query($con, $query);

            $remarks = $_POST['remarks'];
            $query2 = "UPDATE graph_status_table SET remarks = ? WHERE Line_name = ?";
            $stmt2 = mysqli_prepare($con, $query2);
            mysqli_stmt_bind_param($stmt2, "ss", $remarks, $line_name);
            $insert2 = mysqli_stmt_execute($stmt2);
    
            if($insert){
    
                echo json_encode('1');
            }
        }


    


        //jm updatelinestatus

        

        if($_POST['action'] == 'new_timetable'){

            if(isset($_POST['timeval']) && isset($_POST['timeval2'])){

                $time_val  = $_POST['timeval'];
                $time_val2 = $_POST['timeval2'];

                $time_trimmed = substr($time_val2, 0,2);

                if($time_trimmed > 12){

                    $time_val3 = date('h:i a', strtotime($time_val2));
                }

                else{

                    $time_val3 = "";
                }

                $query = "SELECT Time_Id FROM time_table ";
                $query .="WHERE Time_val = '$time_val' ";
                $query .="AND Time_val2 = '$time_val2' ";
                $query .="AND Time_val3 = '$time_val3' ";
                $query .="AND `Status` = 1 ";

                $fetch = mysqli_query($con, $query);

                $count = mysqli_num_rows($fetch);

                if($fetch){

                    if($count == 0){

                        $query1 = "INSERT INTO time_table (Time_val, Time_val2, Time_val3, Date_added, Time_added) ";
                        $query1 .="VALUES ('$time_val', '$time_val2', '$time_val3', curdate(), curtime()) ";

                        $insert1 = mysqli_query($con, $query1);

                        if($insert1){

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }

                    else{

                        echo json_encode('4');
                    }
                }

                else{

                    echo json_encode('3');
                }
            }
        }

        //==========================================================================
        if($_POST['action'] == 'new_subleader'){

            if(isset($_POST['timeval']) && isset($_POST['timeval2'])){

                $time_val  = $_POST['timeval'];
                $time_val2 = $_POST['timeval2'];

                $time_trimmed = substr($time_val2, 0,2);

                if($time_trimmed > 12){

                    $time_val3 = date('h:i a', strtotime($time_val2));
                }

                else{

                    $time_val3 = "";
                }

                $query = "SELECT Time_Id FROM time_table ";
                $query .="WHERE Time_val = '$time_val' ";
                $query .="AND Time_val2 = '$time_val2' ";
                $query .="AND Time_val3 = '$time_val3' ";
                $query .="AND `Status` = 1 ";

                $fetch = mysqli_query($con, $query);

                $count = mysqli_num_rows($fetch);

                if($fetch){

                    if($count == 0){

                        $query1 = "INSERT INTO time_table (Time_val, Time_val2, Time_val3, Date_added, Time_added) ";
                        $query1 .="VALUES ('$time_val', '$time_val2', '$time_val3', curdate(), curtime()) ";

                        $insert1 = mysqli_query($con, $query1);

                        if($insert1){

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }

                    else{

                        echo json_encode('4');
                    }
                }

                else{

                    echo json_encode('3');
                }
            }
        }
        //==========================================================================



        else if($_POST['action'] == 'new_output'){

            if( isset($_POST['total_count']) && 
                isset($_POST['lineout_Id']) && 
                isset($_POST['description']) ){

                $total_output   = $_POST['total_count'];    
                $lineout_Id     = $_POST['lineout_Id'];
                $time_Id_val    = "";
                $description    = escape($_POST['description']);

                // ============== Get time_Id ==================
                    $query0 = "SELECT Time_Id, Time_val2, Time_val3 ";
                    $query0 .="FROM time_table ";
                    $query0 .="WHERE Status = 1 ";

                    $fetch0 = mysqli_query($con, $query0);

                    if($fetch0){

                        while($row0 = mysqli_fetch_assoc($fetch0)){

                            $time_Id    = $row0['Time_Id'];
                            $time_val2  = $row0['Time_val2'];
                            $time_val3  = $row0['Time_val3'];

                            // =============== Depend on shift ================
                                if($_POST['shift_val'] == 'Day Shift'){

                                    $time_hour = date('H', strtotime($time_val2));
                                }

                                else{

                                    $time_hour = date('H', strtotime($time_val3));
                                }
                            // =============== Depend on shift END =============

                            if($time_hour == $current_hour){

                                $time_Id_val = $time_Id;
                            }
                        }
                    }
                // ============== Get time_Id END ==============
                
                // ============== Time_target ID ===============

                    // ============= If there are selected Time =============
                        if($_POST['time_dd'] != ''){
                            
                            $time_Id_val = $_POST['time_dd'];
                        }
                    // ============= If there are selected Time END =========

                    $query1 = "SELECT Time_Target_ID, Target_val ";
                    $query1 .="FROM time_targets ";
                    $query1 .="WHERE Line_Id = '$line_Id' AND Time_Id = '$time_Id_val' ";

                    $fetch1 = mysqli_query($con, $query1);

                    $count1 = mysqli_num_rows($fetch1);

                    if($fetch1){

                        if($count1 > 0){

                            $row1 = mysqli_fetch_assoc($fetch1);

                            $time_target_Id = $row1['Time_Target_ID'];
                            $target_val     = $row1['Target_val'];

                            if($time_target_Id != null){

                                $query = "INSERT INTO output_records (
                                            Line_Output_Id, 
                                            Time_Target_ID, 
                                            `Description`,
                                            Output_count, 
                                            Target_val, 
                                            Date_added, 
                                            Time_added
                                        ) ";

                                $query .="VALUES (
                                            '$lineout_Id', 
                                            '$time_target_Id', 
                                            '$description', 
                                            '$total_output', 
                                            '$target_val', 
                                            curdate(), 
                                            curtime()
                                        ) ";    

                                $insert = mysqli_query($con, $query);

                                if($insert){

                                    echo json_encode('1');
                                }

                                else{

                                    echo json_encode('2');
                                }
                            }
                        }

                        else{

                            echo json_encode('2');
                        }

                    }

                    else{

                        echo json_encode('2');
                    }
                // ============== Time_target ID END ===========
                
            }

            else{

                echo json_encode('3');
            }
        }



        else if($_POST['action'] == 'new_line'){

            if( isset($_POST['lineval']) && 
                isset($_POST['linepass'])){

                $line_val   = $_POST['lineval'];
                $line_pass  = $_POST['linepass'];
                
                $query = "SELECT COUNT(Line_Id) as Total ";
                $query .="FROM prod_lines ";
                $query .="WHERE Line_name = '$line_val' AND Status = 1 ";

                $fetch = mysqli_query($con, $query);

                if($fetch){

                    $row = mysqli_fetch_assoc($fetch);

                    $total = $row['Total'];

                    if($total == 0){

                        $line_pass = password_hash($line_pass, PASSWORD_BCRYPT, array('cost' => 12));

                        $query2 = "INSERT INTO prod_lines (Line_name, `Password`, Date_added, Time_added) ";
                        $query2 .="VALUES ('$line_val', '$line_pass', curdate(), curtime()) ";

                        $insert2 = mysqli_query($con, $query2);

                        if($insert2){

                            $query3 = "";

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }

                    else{

                        echo json_encode('4');
                    }
                }

                else{

                    echo json_encode('2');
                }
            }

            else{

                echo json_encode('3');
            }

        }



        else if($_POST['action'] == 'new_target'){

            if( isset($_POST['e_time_id']) && 
                isset($_POST['e_line_id']) && 
                isset($_POST['e_target_val']) ){

                $time_Id    = $_POST['e_time_id'];
                $line_Id    = $_POST['e_line_id'];
                $target_val = $_POST['e_target_val'];

                $query = "SELECT COUNT(Time_Target_ID) as Total ";
                $query .="FROM time_targets ";
                $query .="WHERE Line_Id = '$line_Id' AND Time_Id = '$time_Id' ";
                $query .="AND `Status` = 1 ";

                $fetch = mysqli_query($con, $query);

                if($fetch){

                    $row = mysqli_fetch_assoc($fetch);

                    $total = $row['Total'];

                    if($total == 0){

                        $query2 = "INSERT INTO time_targets (Line_Id, Time_Id, Target_val, Date_added, Time_added) ";
                        $query2 .="VALUES ('$line_Id', '$time_Id', '$target_val', curdate(), curtime()) ";

                        $insert2 = mysqli_query($con, $query2);

                        if($insert2){

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }

                    else{

                        $query2 = "UPDATE time_targets SET Target_val = '$target_val' ";
                        $query2 .="WHERE Line_Id = '$line_Id' AND Time_Id = '$time_Id' ";
                        $query2 .="AND `Status` = 1 ";

                        $update2 = mysqli_query($con, $query2);

                        if($update2){

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }
                }

                else{

                    echo json_encode('2');
                }
            }

            else{

                echo json_encode('3');
            }
        }



        else if($_POST['action'] == 'change_shift'){

            $query = "SELECT Line_Output_Id, Shift ";
            $query .="FROM line_output ";
            $query .="WHERE Line_Id = '$line_Id' AND Status = 1 ";
            $query .="ORDER BY Line_Output_Id DESC ";
            $query .="LIMIT 1 ";
            
            $fetch = mysqli_query($con, $query);

            $count = mysqli_num_rows($fetch);

            if($fetch){

                if($count > 0){

                    $row = mysqli_fetch_assoc($fetch);

                    $line_output_Id = $row['Line_Output_Id'];
                    $shift_val      = $row['Shift'];

                    if($shift_val == 'Day Shift'){

                        $shift_val = 'Night Shift';
                    }

                    else{

                        $shift_val = 'Day Shift';
                    }

                }

                else{

                    $shift_val = 'Day Shift';
                }

                $query1 = "SELECT COUNT(Line_Output_Id) as Total ";
                $query1 .="FROM line_output ";
                $query1 .="WHERE Line_Id = '$line_Id' ";
                $query1 .="AND Date_added = curdate() ";
                $query1 .="AND Shift = '$shift_val' ";

                $fetch1 = mysqli_query($con, $query1);

                if($fetch1){

                    $row1 = mysqli_fetch_assoc($fetch1);

                    $count1 = $row1['Total'];

                    if($count1 == 0){

                        $query2 = "INSERT INTO line_output (Line_Id, Shift, Date_added, Time_added) ";
                        $query2 .="VALUES ('$line_Id', '$shift_val', curdate(), curtime()) ";

                        $insert2 = mysqli_query($con, $query2);

                        if($insert2){

                            echo json_encode('1');
                        }

                        else{

                            echo json_encode('2');
                        }
                    }

                    else{

                        echo json_encode('4');
                    }
                }

                else{

                    echo json_encode('2');
                }

            }

            else{

                echo json_encode('2');
            }
        }


        
    }

?>
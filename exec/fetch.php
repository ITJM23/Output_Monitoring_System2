<?php

    session_start();

    include "../includes/db.php";
    include "../includes/functions.php";
    
    
    if(isset($_COOKIE['OMS_line_Id'])){

        $line_Id = $_COOKIE['OMS_line_Id'];
    }

    else{

        $line_Id = "";

    }


    
    if(isset($_POST['action'])){


        if ($_POST['action'] === 'getDropdownValues') {
            // Fetch values from the database
            $sql = "SELECT DISTINCT model FROM models"; // Replace 'models' with your table name
        
            $result = $con->query($sql);
        
            $values = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $values[] = $row['model'];
                }
            }
        
            // Send values as JSON response
            echo json_encode($values);
        }

        if ($_POST['action'] === 'getDropdownValues2') {
            // Fetch values from the database
            $sql = "SELECT item_code FROM models"; // Replace 'models' with your table name
        
            $result = $con->query($sql);
        
            $values = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $values[] = $row['item_code'];
                }
            }
        
            // Send values as JSON response
            echo json_encode($values);
        }

        

        if($_POST['action'] == 'line_cards'){

            $query = "SELECT Line_Id, Line_name ";
            $query .="FROM prod_lines ";
            $query .="WHERE Status = 1 ";

            $query .="ORDER BY Line_name ASC ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $output='';

                $line_arr = array();

                while($row = mysqli_fetch_assoc($fetch)){

                    $line_Id    = $row['Line_Id'];
                    $line_name  = $row['Line_name'];            

                    // $line_arr[$line_Id] = $line_name;

                    $output.='<div class="col-lg-4">';
                    $output.='<div class="card m-1 pointer-cursor" onclick="loginForm(`'.$line_name.'`, `'.$line_Id.'`)">';
                    $output.='<div class="card-body text-center">';
                    $output.='<h1>'.intval($line_name).'</h1>';
                    $output.='</div>';
                    $output.='</div>';
                    $output.='</div>';

                }

                echo json_encode($output);
            }
        }



        else if($_POST['action'] == 'login'){

            if(isset($_POST['lineid']) && isset($_POST['linepass'])){

                $line_Id    = $_POST['lineid'];
                $line_pass  = $_POST['linepass'];

                $query = "SELECT Line_Id, Line_name, `Password` ";
                $query .="FROM prod_lines ";
                $query .="WHERE Line_Id = '$line_Id' ";
                $query .="AND `Status` = 1 ";

                $fetch = mysqli_query($con, $query);

                $count = mysqli_num_rows($fetch);

                if($count > 0){

                    while($row = mysqli_fetch_array($fetch)){
                        
                        $db_line_Id         = $row['Line_Id'];
                        $db_line_name       = $row['Line_name'];
                        $db_user_password 	= escape($row['Password']);
                    }
    
                    if(isset($db_user_password)){
    
                        if(password_verify($line_pass, $db_user_password)){
    
                            setcookie("OMS_line_Id", $db_line_Id, time()+3600 * 24 * 365, '/');
                            setcookie("OMS_line_name", $db_line_name, time()+3600 * 24 * 365, '/');
    
                            echo json_encode('1');
    
                        }
    
                        else{
    
                            echo json_encode('2');
    
                        }
    
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



        else if($_POST['action'] == 'login_admin'){

            if(isset($_POST['admin_usrname']) && isset($_POST['admin_pass'])){

                $admin_usrname  = $_POST['admin_usrname'];
                $admin_pass     = $_POST['admin_pass'];

                $query = "SELECT `User_Id`, User_lvl_Id, `Password` ";
                $query .="FROM users ";
                $query .="WHERE Username = '$admin_usrname' ";
                $query .="AND `Status` = 1 ";

                $fetch = mysqli_query($con, $query);

                $count = mysqli_num_rows($fetch);

                if($count > 0){

                    while($row = mysqli_fetch_array($fetch)){
                        
                        $db_user_Id         = $row['User_Id'];
                        $db_user_lvl        = $row['User_lvl_Id'];
                        $db_user_password 	= escape($row['Password']);
                    }
    
                    if(isset($db_user_password)){
    
                        if(password_verify($admin_pass, $db_user_password)){
    
                            setcookie("OMS_admin_Id", $db_user_Id, time()+3600 * 24 * 365, '/');
                            setcookie("OMS_user_lvl", $db_user_lvl, time()+3600 * 24 * 365, '/');
    
                            echo json_encode('1');
    
                        }
    
                        else{
    
                            echo json_encode('2');
    
                        }
    
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



        else if($_POST['action'] == 'active_line_output'){

            $query = "SELECT 
                        Line_Output_Id,
                        Model_code, 
                        Sub_leader, 
                        Start_serial,
                        End_serial, 
                        Date_added,
                        Shift ";

            $query .="FROM line_output ";
            $query .="WHERE Status = 1 AND Line_Id = '$line_Id' ";
            // $query .="AND Date_added = curdate() ";
            $query .="ORDER BY Line_Output_Id DESC ";
            $query .="LIMIT 1 ";

            $fetch = mysqli_query($con, $query);

            $count = mysqli_num_rows($fetch);

            if($fetch){

                if($count > 0){

                    $row = mysqli_fetch_assoc($fetch);  
    
                    $line_output_Id = $row['Line_Output_Id'];
                    $model_code     = $row['Model_code'];
                    $sub_leader     = $row['Sub_leader'];
                    $start_serial   = $row['Start_serial'];
                    $end_serial     = $row['End_serial'];
                    $date_added     = $row['Date_added'];
                    $shift_val      = $row['Shift'];
    
                    $arr = array(
                        'LO_ID' => $line_output_Id,
                        'ModelCode' => $model_code,
                        'Subleader' => $sub_leader,
                        'StrtSerial' => $start_serial,
                        'EndSerial' => $end_serial,
                        'DateAdded' => date('M d, Y', strtotime($date_added)),
                        'ShiftVal' => $shift_val
                    );
                }

                else{
    
                    $arr = array(
                        'LO_ID' => null,
                        'ModelCode' => '',
                        'Subleader' => '',
                        'StrtSerial' => '',
                        'EndSerial' => '',
                        'DateAdded' => '',
                        'ShiftVal' => ''
                    );
                }
                
                echo json_encode($arr);
            }

            
        }



        else if($_POST['action'] == 'time_dd'){

            $query = "SELECT time_targets.Time_Target_Id , time_targets.Line_Id, time_targets.Time_Id, time_table.Time_val ";
            $query .="FROM time_targets LEFT JOIN time_table ";
            $query .="ON time_targets.Time_Id = time_table.Time_Id ";
            $query .="WHERE time_targets.Line_Id = '$line_Id' AND time_targets.Status = 1 ";
            $query .="ORDER BY time_table.Time_val ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $timetbl_arr = array();

                $output ='';

                $output .='<option value="">Select time here</option>';

                while($row = mysqli_fetch_assoc($fetch)){

                    $time_target_Id  = $row['Time_Target_Id'];
                    $time_Id         = $row['Time_Id'];
                    $time_val        = $row['Time_val'];

                    // $timetbl_arr[$time_Id] = $time_val;

                    $output .='<option value="'.$time_Id.'">'.$time_val.'</option>';
                }

                echo json_encode($output);
            }
        }



        else if($_POST['action'] == 'timetable_loop'){

            $query = "SELECT time_table.Time_Id, time_table.Time_val, ";
            $query .="time_targets.Time_Target_Id, time_targets.Target_val ";

            $query .="FROM time_table ";

            $query .="LEFT OUTER JOIN time_targets ";
            $query .="ON time_table.Time_Id = time_targets.Time_Id ";

            $query .="WHERE time_table.Status = 1 ";

            $query .="AND time_targets.Status = 1 ";
            $query .="AND time_targets.Line_Id = '$line_Id' ";

            $query .="ORDER BY time_table.Time_val ASC ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $timetable_arr  = array();
                $target_arr     = array();
                $output_arr     = array();

                while($row = mysqli_fetch_assoc($fetch)){

                    $time_target_Id = $row['Time_Target_Id'];
                    $time_Id        = $row['Time_Id'];
                    $time_val       = $row['Time_val']; 
                    $target_val     = $row['Target_val'];

                    $query2 = "SELECT SUM(Output_count) as Total_output ";
                    $query2 .="FROM output_records ";
                    $query2 .="WHERE Status = 1 ";

                    if($_POST['lineoutid'] != ''){

                        $lineout_Id = $_POST['lineoutid'];

                        $query2 .="AND Line_Output_Id = '$lineout_Id' ";
                    }

                    $query2 .="AND Time_Target_ID = '$time_target_Id' ";

                    // $query2 .="AND Date_added = curdate() ";

                    $fetch2 = mysqli_query($con, $query2);

                    if($fetch2){

                        $row2 = mysqli_fetch_assoc($fetch2);

                        $total_output   = $row2['Total_output'];

                        // if($total_output == null || $total_output == ''){

                        //     $total_output = 0;
                        // }

                        array_push($output_arr, $total_output);
                    }

                    array_push($timetable_arr, $time_val);
                    array_push($target_arr, $target_val);
                    
                }

                $arr = array(
                    'TimeTbl' => $timetable_arr,
                    'Targets' => $target_arr,
                    'Outputs' => $output_arr
                );

                echo json_encode($arr);
            }
        }


        //jm added code============================================
        //jm added code============================================
        else if ($_POST['action'] == 'timetable_loop2') {
            $query = "SELECT time_table.Time_Id, time_table.Time_val, ";
            $query .= "time_targets.Time_Target_Id, time_targets.Target_val ";
        
            $query .= "FROM time_table ";
        
            $query .= "LEFT OUTER JOIN time_targets ";
            $query .= "ON time_table.Time_Id = time_targets.Time_Id ";
        
            $query .= "WHERE time_table.Status = 1 ";
        
            $query .= "AND time_targets.Status = 1 ";
            $query .= "AND time_targets.Line_Id = '$line_Id' ";
        
            $query .= "ORDER BY time_table.Time_val ASC ";
        
            $fetch = mysqli_query($con, $query);
        
            if ($fetch) {
        
                $timetable_arr = array('Remarks');
                $target_arr = array('Target');
                $output_arr = array('Actual');
                $description_arr = array('Remarks'); // Initialize the description array
        
                while ($row = mysqli_fetch_assoc($fetch)) {
        
                    $time_target_Id = $row['Time_Target_Id'];
                    $time_Id = $row['Time_Id'];
                    $time_val = $row['Time_val'];
                    $target_val = $row['Target_val'];
        
                    $query2 = "SELECT SUM(Output_count) as Total_output, Description"; // Fix the query syntax here
                    $query2 .= " FROM output_records ";
                    $query2 .= "WHERE Status = 1 ";
        
                    if ($_POST['lineoutid'] != '') {
        
                        $lineout_Id = $_POST['lineoutid'];
        
                        $query2 .= "AND Line_Output_Id = '$lineout_Id' ";
                    }
        
                    $query2 .= "AND Time_Target_ID = '$time_target_Id' ";
        
                    $fetch2 = mysqli_query($con, $query2);
        
                    if ($fetch2) {
        
                        $row2 = mysqli_fetch_assoc($fetch2);
        
                        $total_output = $row2['Total_output'];
                        $Description = $row2['Description'];
                        
                        // Check if the Description is blank, if yes, set it to '---'
                        if ($Description == '') {
                            $Description = '---';
                        }
        
                        array_push($output_arr, $total_output);
                        array_push($description_arr, $Description);
                    }
        
                    array_push($timetable_arr, $time_val);
                    array_push($target_arr, $target_val);
                }
        
                $arr3 = array(
                    $target_arr,
                    $output_arr,
                    $description_arr
                );
        
                echo json_encode($arr3);
            }
        }
        //jm added code============================================
        //jm added code============================================
        
        



        else if($_POST['action'] == 'timetable_loop3'){

            $query = "SELECT 
                        time_table.Time_Id, 
                        time_table.Time_val,
                        time_targets.Time_Target_Id, 
                        time_targets.Target_val ";

            $query .="FROM 
                        time_table ";

            $query .="LEFT OUTER JOIN 
                        time_targets ";

            $query .="ON 
                        time_table.Time_Id = time_targets.Time_Id ";

            $query .="WHERE 
                        time_table.Status = 1 
                        AND time_targets.Status = 1 ";

            if($_POST['lineid'] != ''){

                $line_Id = $_POST['lineid'];
                
                $query .="AND time_targets.Line_Id = '$line_Id' ";
            }

            $query .="ORDER BY time_table.Time_val ASC ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $timetable_arr  = array('x');
                $target_arr     = array('Target');
                $output_arr     = array('Actual');

                while($row = mysqli_fetch_assoc($fetch)){

                    $time_target_Id = $row['Time_Target_Id'];
                    $time_Id        = $row['Time_Id'];
                    $time_val       = $row['Time_val']; 
                    $target_val     = $row['Target_val'];
                    
                    array_push($timetable_arr, $time_val);
                    array_push($target_arr, $target_val);

                    $query2 = "SELECT SUM(Output_count) as Total_output ";
                    $query2 .="FROM output_records ";
                    $query2 .="WHERE Status = 1 ";

                    if($_POST['lineoutid'] != ''){

                        $lineout_Id = $_POST['lineoutid'];

                        $query2 .="AND Line_Output_Id = '$lineout_Id' ";
                    }

                    $query2 .="AND Time_Target_ID = '$time_target_Id' ";

                    $fetch2 = mysqli_query($con, $query2);

                    if($fetch2){

                        $row2 = mysqli_fetch_assoc($fetch2);

                        $total_output   = $row2['Total_output'];

                        array_push($output_arr, $total_output);
                    }

                    
                }

                $arr2 = array(
                    $timetable_arr,
                    $target_arr,
                    $output_arr
                );

                echo json_encode($arr2);
            }
        }



        else if($_POST['action'] == 'line_info'){

            if(isset($_POST['lineid'])){

                $line_Id = $_POST['lineid'];

                $query = "SELECT Line_name FROM prod_lines ";
                $query .="WHERE Line_Id = '$line_Id' ";

                $fetch = mysqli_query($con, $query);

                if($fetch){

                    $row = mysqli_fetch_assoc($fetch);

                    $line_name = $row['Line_name'];
                }

                echo json_encode($line_name);
            }
        }



        else if($_POST['action'] == 'prod_line_graphs'){

            $query = "SELECT Line_Id, Line_name ";
            $query .="FROM prod_lines ";
            $query .="WHERE prod_lines.Status = 1 ";
            $query .="ORDER BY Line_name ASC ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $prod_line_arr  = array();
                $prod_line_info = array();

                while($row = mysqli_fetch_assoc($fetch)){

                    $line_Id        = $row['Line_Id'];
                    $line_name      = $row['Line_name'];

                    // ================== Check line Output =================
                        $query2 = "SELECT Line_Output_Id FROM line_output ";
                        $query2 .="WHERE Line_Id = '$line_Id' ";

                        if($_POST['datefil'] != ''){

                            $date_fil = $_POST['datefil'];

                            $query2 .="AND Date_added = '$date_fil' ";
                        }

                        else{

                            $query2 .="AND Date_added = curdate() ";
                        }

                        if($_POST['shiftfil'] != ''){

                            $shift_val = $_POST['shiftfil'];

                            $query2 .="AND Shift = '$shift_val' ";
                        }

                        else{

                            $query2 .="AND Shift = 'Day Shift' ";
                        }

                        $query2 .="ORDER BY Line_Output_Id DESC LIMIT 1 ";

                        $fetch2 = mysqli_query($con, $query2);

                        $count2 = mysqli_num_rows($fetch2);

                        if($fetch2){

                            if($count2 > 0){

                                $row2 = mysqli_fetch_assoc($fetch2);

                                $line_output_Id = $row2['Line_Output_Id'];

                            }

                            else{

                                $line_output_Id = 0;
                            }

                        }
                    // ================== Check line Output END =============

                    $prod_line_info = array(
                        'Line_Id' => $line_Id,
                        'Line_name' => $line_name,
                        'Line_Out_Id' => $line_output_Id
                    );

                    array_push($prod_line_arr, $prod_line_info);

                }

                echo json_encode($prod_line_arr);
            }
        }



        else if($_POST['action'] == 'shiftlogs_tbl'){

            $query ="SELECT 
                        Line_Output_Id, 
                        Date_added,
                        Time_added,
                        Shift ";

            $query .="FROM line_output ";

            $query .="WHERE 
                        Line_Id = '$line_Id' 
                        AND Date_added = curdate() ";

            $query .="ORDER BY Line_Output_Id DESC ";

            $fetch = mysqli_query($con, $query);

            if($fetch){

                $shiftlogs_arr = array();

                while($row = mysqli_fetch_assoc($fetch)){

                    $lineout_Id = $row['Line_Output_Id'];
                    $date_added = $row['Date_added'];
                    $time_added = $row['Time_added'];
                    $shift_val  = $row['Shift'];

                    $shiftlog_arr = array(
                        'Lineout_Id' => $lineout_Id,
                        'Date_added' => date('M d, Y', strtotime($date_added)),
                        'Time_added' => date('h:i A', strtotime($time_added)),
                        'Shift_val' => $shift_val
                    );

                    array_push($shiftlogs_arr, $shiftlog_arr);
                }

                echo json_encode($shiftlogs_arr);
            }
        }


        // ===================== Admin Functions ====================
            else if($_POST['action'] == 'admin_prod_line_graphs'){

                $query = "SELECT Line_Id, Line_name ";
                $query .="FROM prod_lines ";
                $query .="WHERE prod_lines.Status = 1 ";
                $query .="ORDER BY Line_name ASC ";

                $fetch = mysqli_query($con, $query);

                if($fetch){

                    $prod_line_arr  = array();
                    $prod_line_info = array();

                    while($row = mysqli_fetch_assoc($fetch)){

                        $line_Id        = $row['Line_Id'];
                        $line_name      = $row['Line_name'];

                        // ================== Check line Output =================
                            $query2 = "SELECT Line_Output_Id FROM line_output ";
                            $query2 .="WHERE Line_Id = '$line_Id' ";

                            if($_POST['datefil'] != ''){

                                $date_fil = $_POST['datefil'];

                                $query2 .="AND Date_added = '$date_fil' ";
                            }

                            else{

                                $query2 .="AND Date_added = curdate() ";
                            }

                            if($_POST['shiftfil'] != ''){

                                $shift_fil = $_POST['shiftfil'];

                                $query2 .="AND Shift = '$shift_fil' ";
                            }

                            else{

                                $query2 .="AND Shift = 'Day Shift' ";
                            }

                            $query2 .="ORDER BY Line_Output_Id DESC LIMIT 1 ";

                            $fetch2 = mysqli_query($con, $query2);

                            $count2 = mysqli_num_rows($fetch2);

                            if($fetch2){

                                if($count2 > 0){

                                    $row2 = mysqli_fetch_assoc($fetch2);

                                    $line_output_Id = $row2['Line_Output_Id'];

                                }

                                else{

                                    $line_output_Id = 0;
                                }

                            }
                        // ================== Check line Output END =============

                        $prod_line_info = array(
                            'Line_Id' => $line_Id,
                            'Line_name' => $line_name,
                            'Line_Out_Id' => $line_output_Id
                        );

                        array_push($prod_line_arr, $prod_line_info);

                    }

                    echo json_encode($prod_line_arr);
                }
            }



            else if($_POST['action'] == 'admin_timetable_loop'){

                $query = "SELECT time_table.Time_Id, time_table.Time_val, ";
                $query .="time_targets.Time_Target_Id, time_targets.Target_val ";

                $query .="FROM time_table ";

                $query .="LEFT OUTER JOIN time_targets ";
                $query .="ON time_table.Time_Id = time_targets.Time_Id ";

                $query .="WHERE time_table.Status = 1 ";

                $query .="AND time_targets.Status = 1 ";

                if($_POST['lineid'] != ''){

                    $line_Id = $_POST['lineid'];

                    $query .="AND time_targets.Line_Id = '$line_Id' ";
                }

                $query .="ORDER BY time_table.Time_val ASC ";

                $fetch = mysqli_query($con, $query);

                if($fetch){

                    $timetable_arr  = array();
                    $target_arr     = array();
                    $output_arr     = array();

                    while($row = mysqli_fetch_assoc($fetch)){

                        $time_target_Id = $row['Time_Target_Id'];
                        $time_Id        = $row['Time_Id'];
                        $time_val       = $row['Time_val']; 
                        $target_val     = $row['Target_val'];

                        $query2 = "SELECT SUM(Output_count) as Total_output ";
                        $query2 .="FROM output_records ";
                        $query2 .="WHERE Status = 1 ";

                        if($_POST['lineoutid'] != ''){

                            $lineout_Id = $_POST['lineoutid'];

                            $query2 .="AND Line_Output_Id = '$lineout_Id' ";
                        }

                        $query2 .="AND Time_Target_ID = '$time_target_Id' ";

                        $fetch2 = mysqli_query($con, $query2);

                        if($fetch2){

                            $row2 = mysqli_fetch_assoc($fetch2);

                            $total_output   = $row2['Total_output'];

                            array_push($output_arr, $total_output);
                        }

                        array_push($timetable_arr, $time_val);
                        array_push($target_arr, $target_val);
                        
                    }

                    $arr = array(
                        'TimeTbl' => $timetable_arr,
                        'Targets' => $target_arr,
                        'Outputs' => $output_arr
                    );

                    echo json_encode($arr);
                }
            }



            else if($_POST['action'] == 'line_output_info'){

                if(isset($_POST['lineoutid'])){

                    $lineout_Id = $_POST['lineoutid'];

                    $query = "SELECT 
                                Line_Id,
                                Model_code, 
                                Sub_leader, 
                                Start_serial,
                                End_serial, 
                                Date_added,
                                Shift ";

                    $query .="FROM line_output ";
                    $query .="WHERE Status = 1 AND Line_Output_Id = '$lineout_Id' ";
                    // $query .="AND Date_added = curdate() ";
                    $query .="ORDER BY Line_Output_Id DESC ";
                    $query .="LIMIT 1 ";

                    $fetch = mysqli_query($con, $query);

                    if($fetch){

                        $row = mysqli_fetch_assoc($fetch);  

                        // $line_output_Id = $row['Line_Output_Id'];
                        $admn_line_Id   = $row['Line_Id'];
                        $model_code     = $row['Model_code'];
                        $sub_leader     = $row['Sub_leader'];
                        $start_serial   = $row['Start_serial'];
                        $end_serial     = $row['End_serial'];
                        $date_added     = $row['Date_added'];
                        $shift_val      = $row['Shift'];

                        $arr = array(
                            // 'LO_ID' => $line_output_Id,
                            'LineId' => $admn_line_Id,
                            'ModelCode' => $model_code,
                            'Subleader' => $sub_leader,
                            'StrtSerial' => $start_serial,
                            'EndSerial' => $end_serial,
                            'DateAdded' => date('M d, Y', strtotime($date_added)),
                            'ShiftVal' => $shift_val
                        );

                        echo json_encode($arr);
                    }

                }
            }

            //jm graph display ---------------------------------------

             else if ($_POST['action'] == 'graph_status') {
                $query = "SELECT status_id, Line_name, graph_display,remarks FROM graph_status_table";
                $fetch = mysqli_query($con, $query);
            
                $graph_display = ""; // Initialize $graph_display
            /*
                if ($fetch) {
                    while ($row = mysqli_fetch_assoc($fetch)) {
                        $graph_display = $row['graph_display'];
                    }
            
                    if ($graph_display == "BREsAKTIME") {
                        echo json_encode('1');
                    } else {
                        echo json_encode('2');
                    }
                }
                */

                if ($fetch) {
                    $statusData = array(); // Initialize an array to hold the data
            
                    // Fetch each row and add it to the array
                    while ($row = mysqli_fetch_assoc($fetch)) {
                        $statusData[] = $row;
                    }
            
                    // Encode the array as JSON and echo it
                    echo json_encode($statusData);
                } else {
                    echo json_encode(array('error' => 'Failed to fetch data'));
                }
            }
                
            // graph display ---------------------------------------


            else if($_POST['action'] == 'timetable_loop_admin'){

                $query = "SELECT 
                            time_table.Time_Id, 
                            time_table.Time_val, 
                            time_targets.Time_Target_Id, 
                            time_targets.Target_val ";
    
                $query .="FROM 
                            time_table ";
    
                $query .="LEFT OUTER JOIN 
                            time_targets ";

                $query .="ON 
                            time_table.Time_Id = time_targets.Time_Id ";
    
                $query .="WHERE 
                            time_table.Status = 1 
                            AND time_targets.Status = 1 ";

                if($_POST['lineid'] != ''){

                    $line_Id = $_POST['lineid'];

                    $query .="AND time_targets.Line_Id = '$line_Id' ";
                }
    
                $query .="ORDER BY time_table.Time_val ASC ";
    
                $fetch = mysqli_query($con, $query);
    
                if($fetch){
    
                    $timetable_arr  = array();
                    $target_arr     = array('Target');
                    $output_arr     = array('Actual');
    
                    while($row = mysqli_fetch_assoc($fetch)){
    
                        $time_target_Id = $row['Time_Target_Id'];
                        $time_Id        = $row['Time_Id'];
                        $time_val       = $row['Time_val']; 
                        $target_val     = $row['Target_val'];
    
                        $query2 = "SELECT SUM(Output_count) as Total_output ";
                        $query2 .="FROM output_records ";
                        $query2 .="WHERE Status = 1 ";
    
                        if($_POST['lineoutid'] != ''){
    
                            $lineout_Id = $_POST['lineoutid'];
    
                            $query2 .="AND Line_Output_Id = '$lineout_Id' ";
                        }
    
                        $query2 .="AND Time_Target_ID = '$time_target_Id' ";
    
                        $fetch2 = mysqli_query($con, $query2);
    
                        if($fetch2){
    
                            $row2 = mysqli_fetch_assoc($fetch2);
    
                            $total_output   = $row2['Total_output'];
    
                            array_push($output_arr, $total_output);
                        }
    
                        array_push($timetable_arr, $time_val);
                        array_push($target_arr, $target_val);
                        
                    }
    
                    $arr = array(
                        'TimeTbl' => $timetable_arr,
                        'Targets' => $target_arr,
                        'Outputs' => $output_arr
                    );
    
                    $arr2 = array(
                        $target_arr,
                        $output_arr
                    );
    
                    echo json_encode($arr2);
                }
            }
        // ===================== Admin Functions END ================


        
    }

?>
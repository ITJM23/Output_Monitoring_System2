<?php

    session_start();

    include "../includes/db.php";



    if(isset($_COOKIE['OMS_line_Id'])){

        $line_Id = $_COOKIE['OMS_line_Id'];
    }

    else{

        $line_Id = "";

    }


    $column = array("time_table.Time_val", "time_targets.Target_val", "SUM(output_records.Output_count)", "");

    $query ="SELECT time_table.Time_Id, time_table.Time_val, "; 
    $query .="time_targets.Target_val, "; 
    $query .="SUM(output_records.Output_count) as Total_Output "; 

    $query .="FROM time_table ";

    $query .="LEFT JOIN time_targets ";
    $query .="ON time_table.Time_Id = time_targets.Time_Id ";

    $query .="LEFT JOIN output_records ";
    $query .="ON output_records.Time_Target_ID = time_targets.Time_Target_ID ";

    $query .="LEFT JOIN line_output ";
    $query .="ON line_output.Line_Output_Id = output_records.Line_Output_Id ";

    $query .="WHERE time_table.Status = 1 ";
    $query .="AND time_targets.Status = 1 ";
    $query .="AND time_targets.Line_Id = '$line_Id' ";
    // $query .="AND output_records.Date_added = curdate() ";

    if($_POST['lineoutid'] != ''){

        $active_lineout_Id = $_POST['lineoutid'];

        $query .="AND output_records.Line_Output_Id = '$active_lineout_Id' ";
    }

    if(isset($_POST["search"]["value"])){											

        $query .='AND (time_table.Time_val LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .='OR time_targets.Target_val LIKE "%'.$_POST["search"]["value"].'%") ';
    }

    $query .="GROUP BY time_table.Time_Id ";
    
    if(isset($_POST["order"])){

        $query .='ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir']. ' ';
    }

    else{

        $query .='ORDER BY time_table.Time_val DESC ';
    }

    $query1 ='';

    if($_POST["length"] != -1){

        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $count = mysqli_num_rows(mysqli_query($con, $query));

    $result = mysqli_query($con, $query . $query1);

    $data = array();

    $n = 1;

    while($row = mysqli_fetch_assoc($result)){

        $time_Id        = $row['Time_Id'];
        $time_val       = $row['Time_val'];
        $target_val     = $row['Target_val'];
        $total_output   = $row['Total_Output'];

        // $date_mod = date('M d, Y', strtotime($date_added)) ." | ". date('h:i A', strtotime($time_added));

        $sub_array = array();

        $sub_array[] = "<p class='font-weight-bold'>".$time_val."</p>";
        $sub_array[] = "<h5 class='font-weight-bold text-primary'>".$target_val."</h5>";
        $sub_array[] = "<h5 class='font-weight-bold'>".$total_output."</h5>";

        // ============== Percentage ===============
            $count3 = $total_output / $target_val;
            $count4 = $count3 * 100;
            $count5 = number_format($count4, 0);
            
            if($count5 > 100){
                
                $count5 = 100;
            }
            // ============== Percentage END ===========
            
        if($count5 >= 80 && $count5 <= 100){

            $perc_stat = 'text-success';
        }

        else if($count5 >= 50 && $count5 < 80){

            $perc_stat = 'text-info';
        }

        else if($count5 >= 30 && $count5 < 50){

            $perc_stat = 'text-warning';
        }

        else if($count5 >= 0 && $count5 < 30){

            $perc_stat = 'text-danger';
        }

        $sub_array[] = "<h5 class='font-weight-bold ".$perc_stat."'>".$count5." % </h5>";

        $data[] = $sub_array;
    }

    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsFiltered' => $count,
        'data' => $data
    );

    echo json_encode($output);

?>
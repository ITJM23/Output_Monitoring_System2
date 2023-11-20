<?php

    include "../includes/db.php";

    // if(isset($_COOKIE['OMS_line_Id'])){

    //     $line_Id = $_COOKIE['OMS_line_Id'];
    // }

    // else{

    //     $line_Id = "";

    // }

    $column = array("output_records.Time_added", "time_table.Time_val", "time_targets.Target_val", "output_records.Output_count", "", "", "");

    $query ='SELECT 
                output_records.Rec_Id, 
                output_records.Output_count, 
                output_records.Description,
                output_records.Target_val, 
                output_records.Date_added, 
                output_records.Time_added, ';

    $query .='time_targets.Time_Target_ID, time_table.Time_val ';
    
    $query .='FROM output_records ';
    $query .='LEFT JOIN time_targets ';
    $query .='ON output_records.Time_Target_ID = time_targets.Time_Target_ID ';

    $query .='LEFT JOIN time_table ';
    $query .='ON time_targets.Time_Id = time_table.Time_Id ';

    $query .='WHERE output_records.Status = 1 ';
    // $query .='AND output_records.Date_added = curdate() ';
    // $query .='AND time_targets.Line_Id = "'.$line_Id.'" ';

    if($_POST['lineoutid'] != ''){

        $lineout_Id = $_POST['lineoutid'];

        $query .='AND output_records.Line_Output_Id = "'.$lineout_Id.'" ';
    }

    if(isset($_POST["search"]["value"])){											

        $query .='AND (time_table.Time_val LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .='OR time_targets.Target_val LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .='OR output_records.Output_count LIKE "%'.$_POST["search"]["value"].'%") ';
    }
    
    if(isset($_POST["order"])){

        $query .='ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir']. ' ';
    }

    else{

        $query .='ORDER BY output_records.Date_added DESC, output_records.Time_added DESC ';
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

        $rec_Id         = $row['Rec_Id'];
        $time_val       = $row['Time_val'];

        $description    = $row['Description'];

        $target_val     = $row['Target_val'];
        $total_output   = $row['Output_count'];

        $date_added     = $row['Date_added'];
        $time_added     = $row['Time_added'];

        $date_mod = date('M d, Y', strtotime($date_added)) ." | ". date('h:i A', strtotime($time_added));

        $sub_array = array();

        $sub_array[] = "<p class='font-weight-bold'>".$date_mod."</p>";
        $sub_array[] = "<h5 class='font-weight-bold text-info'>".$time_val."</h5>";
        $sub_array[] = "<h5 class='font-weight-bold text-primary'>".$target_val."</h5>";
        $sub_array[] = "<h5 class='font-weight-bold'>".$total_output."</h5>";
        // $sub_array[] = "<h5 class='font-weight-bold'>---</h5>";
        $sub_array[] = "<h5 class='font-weight-bold'>".$description."</h5>";

        // $sub_array[] = '<button type="button" class="btn btn-danger btn-squared font-weight-bold" onclick="deleteLog(`'.$rec_Id.'`)"> <span class="fa fa-trash"></span> Delete</button>';

        $data[] = $sub_array;
    }

    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsFiltered' => $count,
        'data' => $data
    );

    echo json_encode($output);

?>
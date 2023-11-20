<?php

    include "../includes/db.php";

    $column = array("Time_val", "Target_val", "");

    $query ="SELECT Time_Id, Time_val, Date_added, Time_added ";
    $query .="FROM time_table ";
    $query .="WHERE Status = 1 ";

    if(isset($_POST["search"]["value"])){											

        $query .='AND Time_val LIKE "%'.$_POST["search"]["value"].'%" ';
    }
    
    if(isset($_POST["order"])){

        $query .='ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir']. ' ';
    }

    else{

        $query .='ORDER BY Time_Id DESC ';
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
        $date_added     = $row['Date_added'];
        $time_added     = $row['Time_added'];

        $date_mod = date('M d, Y', strtotime($date_added)) ." | ". date('h:i A', strtotime($time_added));

        $sub_array = array();

        $sub_array[] = "<p class='font-weight-bold'>".$time_val."</p>";

        if($_POST['lineid'] != ''){

            $line_Id = $_POST['lineid'];

            $query2 = "SELECT Time_Target_ID, Target_val ";
            $query2 .="FROM time_targets ";
            $query2 .="WHERE Line_Id = '$line_Id' AND Time_Id = '$time_Id' AND Status = 1 ";

            $fetch2 = mysqli_query($con, $query2);

            $count2 = mysqli_num_rows($fetch2);

            if($fetch2){

                if($count2 > 0){

                    $row2 = mysqli_fetch_assoc($fetch2);
    
                    $tt_Id      = $row2['Time_Target_ID'];
                    $target_val = $row2['Target_val'];
    
                    $sub_array[] = "<p class='font-weight-bold'>".$target_val."</p>";

                }

                else{

                    $target_val = "0";

                    $sub_array[] = "<p class='font-weight-bold'>---</p>";
                }

            }
        }

        else{

            $sub_array[] = "<p class='font-weight-bold'>---</p>";
        }

        $sub_array[] = '
            <button type="button" class="btn btn-primary btn-squared font-weight-bold" onclick="editTargetMod(`'.$time_Id.'`, `'.$time_val.'`, `'.$line_Id.'`, `'.$target_val.'`)">
                <span class="fa fa-pencil-alt"></span> Edit
            </button>
        ';

        $data[] = $sub_array;
    }

    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsFiltered' => $count,
        'data' => $data
    );

    echo json_encode($output);

?>
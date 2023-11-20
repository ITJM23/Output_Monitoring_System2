<?php

    include "../includes/db.php";

    $column = array("Line_name", "", "Date_added", "");

    $query ="SELECT Line_Id, Line_name, Date_added, Time_added ";
    $query .="FROM prod_lines ";
    $query .="WHERE Status = 1 ";

    if(isset($_POST["search"]["value"])){											

        $query .='AND Line_name LIKE "%'.$_POST["search"]["value"].'%" ';
    }
    
    if(isset($_POST["order"])){

        $query .='ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir']. ' ';
    }

    else{

        $query .='ORDER BY Line_Id DESC ';
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

        $line_Id        = $row['Line_Id'];
        $line_name      = $row['Line_name'];
        $date_added     = $row['Date_added'];
        $time_added     = $row['Time_added'];

        $date_mod = date('M d, Y', strtotime($date_added)) ." | ". date('h:i A', strtotime($time_added));

        $sub_array = array();

        $sub_array[] = "<p class='font-weight-bold'>".$line_name."</p>";
        $sub_array[] = '<button type="button" class="btn btn-light btn-squared font-weight-bold" onclick="targetsCard(`'.$line_Id.'`, `'.$line_name.'`)">
                            <span class="fa fa-list"></span>
                        </button>';
        $sub_array[] = "<p class='font-weight-bold'>".$date_mod."</p>";
        $sub_array[] = '
            <button type="button" class="btn btn-primary btn-squared font-weight-bold" onclick="editLine(`'.$line_Id.'`)">
                <span class="fa fa-pencil-alt"></span> Edit
            </button>
            <button type="button" class="btn btn-danger btn-squared font-weight-bold" onclick="deleteLine(`'.$line_Id.'`)">
                <span class="fa fa-trash"></span> Delete
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
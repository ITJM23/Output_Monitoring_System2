<?php

    include "../includes/db.php";

    $column = array("Time_val", "Date_added", "");

    $query ="SELECT Time_Id, Time_val, Time_val2, Date_added, Time_added ";
    $query .="FROM time_table ";
    $query .="WHERE Status = 1 ";

    // $query ="SELECT db1tb1.Emp_Id, db1tb1.Status, db1tb2.Lname, db1tb2.Fname, ";
    // $query .="db2tb1.Emp_Des_Id, db2tb2.Group_name, db2tb3.Section_name, ";
    // $query .="db2tb4.Emp_Alloc_Id, db2tb5.Allocation_name, db2tb6.Pickup_name ";

    // $query .="FROM teipi_emp.employees db1tb1 ";
    
    // $query .="LEFT JOIN teipi_emp.emp_info db1tb2 ";
    // $query .="ON db1tb1.Emp_Id = db1tb2.Emp_Id ";

    // $query .="LEFT JOIN shuttle_allocation.emp_desig db2tb1 ";
    // $query .="ON db1tb1.Emp_Id = db2tb1.Emp_Id ";

    // $query .="LEFT JOIN shuttle_allocation.emp_allocation db2tb4 ";
    // $query .="ON db1tb1.Emp_Id = db2tb4.Emp_Id ";

    // $query .="LEFT JOIN shuttle_allocation.emp_groups db2tb2 ";
    // $query .="ON db2tb1.Group_Id = db2tb2.Group_Id ";

    // $query .="LEFT JOIN shuttle_allocation.section db2tb3 ";
    // $query .="ON db2tb1.Section_Id = db2tb3.Section_Id ";

    // $query .="LEFT JOIN shuttle_allocation.allocation db2tb5 ";
    // $query .="ON db2tb4.Allocation_Id = db2tb5.Allocation_Id ";

    // $query .="LEFT JOIN shuttle_allocation.pickup db2tb6 ";
    // $query .="ON db2tb4.Pickup_Id = db2tb6.Pickup_Id ";

    // $query .="WHERE db1tb1.Status = 1 ";

    // $query .="GROUP BY db1tb1.Emp_Id ";

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
        $time_val2      = $row['Time_val2'];
        $date_added     = $row['Date_added'];
        $time_added     = $row['Time_added'];

        $date_mod = date('M d, Y', strtotime($date_added)) ." | ". date('h:i A', strtotime($time_added));

        $sub_array = array();

        $sub_array[] = "<p class='font-weight-bold'>".$time_val."</p>";
        $sub_array[] = "<p class='font-weight-bold'>".$date_mod."</p>";
        $sub_array[] = '
            <button type="button" class="btn btn-primary btn-squared font-weight-bold" onclick="editTime(`'.$time_Id.'`, `'.$time_val.'`, `'.$time_val2.'`)">
                <span class="fa fa-pencil-alt"></span> Edit
            </button>
            <button type="button" class="btn btn-danger btn-squared font-weight-bold" onclick="deleteTimeTbl(`'.$time_Id.'`)">
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